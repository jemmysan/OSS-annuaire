<?php


namespace App\Http\Controllers;


use App\Models\Startup;
use Illuminate\Http\Request;
use App\Exports\StartupsExport;
use App\Imports\StartupsImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;


class ImportExportController extends Controller
{
    public function importExport()
    {
        return view('startup.import');
    }


    public function importFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ], [
            'file.mimes' => 'Le fichier doit être de type .xlsx',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        if (count($rows[0]) !== 18) {
            return back()->withErrors(['file' => 'Le fichier doit avoir exactement 18 colonnes.'])->withInput();
        }

        session(['fileName' => $file->getClientOriginalName()]);

        // Skip the header row
        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue;
            }

            // Check if the current row has exactly 18 columns
            if (count($row) !== 18) {
                return back()->withErrors(['file' => 'Chaque ligne du fichier doit avoir exactement 18 colonnes.'])->withInput();
            }

            // Assuming $userId is defined somewhere in your code
            $userId = auth()->user()->id;

            $data = [
                'nom_startup' => $row[0],
                'description' => $row[1],
                'partenariat_orange' => $row[2],
                'date_creation' => $row[3],
                'ceo_co_fondateur' => $row[4],
                'adresses' => $row[5],
                'logo' => $row[6],
                'filename' => $row[7],
                'site_web' => $row[8],
                'video' => $row[9],
                'autre_part' => $row[10],
                'leve_fond' => $row[11],
                'montant_fonds' => $row[12],
                'date_leve_fond' => $row[13],
                'coordonnee' => $row[14],
                'email' => $row[15],
                'referent' => $row[16],
                'statut' => $row[17],
                'user_id' => $userId,
            ];

            try {
                Startup::updateOrCreate(
                    ['email' => $data['email']], // Condition for update
                    $data // Data to insert or update
                );
            } catch (\Exception $e) {
                return back()->withErrors(['file' => 'Erreur lors de l\'importation des données : ' . $e->getMessage()]);
            }
        }

        return back()->with('success', 'Fichier importé avec succès.');
    }
    


    public function exportFile()
    {
        return Excel::download(new StartupsExport, 'startups-list.xlsx');
    }
}



