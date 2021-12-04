<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function printBookDesc($id)
    {
        $book = Book::find($id);

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <body>
            <img src= "'. $book->image . ' " style="width:150px"/>
            <p>judul buku: ' . $book->title . '</p>
            <p>isbn: ' . $book->isbn . '</p>
            <p>Penulis : ' . $book->author . '</p>
            <p>Penerbit : ' . $book->publisher . '</p>
            <p>Tahun Terbit : ' . $book->year . '</p>
            <p>Jumlah Buku : ' . $book->quantity . '</p>
            <p>Kategori : ' . $book->category->name . '</p>
            <p>Kondisi : ' . $book->condition->name . '</p>
            <p>Deskripsi : ' . $book->description . '</p>
        </body>
        </html>';
        
        $filename = $book->title.'_'.$book->name.'.docx';

        return response($html)
            ->withHeaders([
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment;filename="'.$filename.'"',
            'Cache-Control' => 'max-age=0',
        ]);
    }

    public function exportBookPdf()
    {
        $books = Book::all();
        $pdf =App::make('dompdf.wrapper');
        $html =
        '<table border="1">
            <thead>
                <tr>
                    <th></th>
                    <th>ISBN</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Kategory</th>
                    <th>Kondisi</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($books as $key => $book) {
            $html .= 
                '<tr>
                    <td>'. $key+1 .'</td>
                    <td>'. $book->isbn .'</td>
                    <td>'. $book->title .'</td>
                    <td>'. $book->author .'</td>
                    <td>'. $book->publisher .'</td>
                    <td>'. $book->category->name .'</td>
                    <td>'. $book->condition->name .'</td>
                </tr>';
        }
        $html .='</tbody>
        </table>';

        $pdf->loadHTML($html);

        return $pdf->stream('Daftar-buku.pdf');
    } 

    public function exportBookExcel()
    {
        return Excel::download(new BooksExport, 'daftar-buku.xlsx');
    }
}


