<?php

namespace App\Exports;

use App\StatusPemrosesan;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BeasiswaExport implements FromCollection, WithHeadings
{
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $items = StatusPemrosesan::select('mahasiswa.nim', 'mahasiswa.nama', 'status_pemrosesan.name as status', DB::raw("DATE_FORMAT(pendaftaran_beasiswa.created_at, '%d/%m/%Y')"), 'prodi.name', 'custom1', 'custom2', 'custom3', 'custom4', 'custom5', 'custom6', 'custom7', 'custom8', 'custom9', 'custom10', 'file1.file_syarat as file1', 'file2.file_syarat as file2', 'file3.file_syarat as file3', 'file4.file_syarat as file4', 'file5.file_syarat as file5', 'file6.file_syarat as file6', 'file7.file_syarat as file7', 'file8.file_syarat as file8', 'file9.file_syarat as file9', 'file10.file_syarat as file10')
            ->leftJoin('mahasiswa', 'pendaftaran_beasiswa.mahasiswa_id', 'mahasiswa.id')
            ->leftJoin('prodi', 'mahasiswa.prodi', 'prodi.id')
            ->leftJoin('file_syarat_beasiswa as file1', 'pendaftaran_beasiswa.file1', 'file1.id')
            ->leftJoin('file_syarat_beasiswa as file2', 'pendaftaran_beasiswa.file2', 'file2.id')
            ->leftJoin('file_syarat_beasiswa as file3', 'pendaftaran_beasiswa.file3', 'file3.id')
            ->leftJoin('file_syarat_beasiswa as file4', 'pendaftaran_beasiswa.file4', 'file4.id')
            ->leftJoin('file_syarat_beasiswa as file5', 'pendaftaran_beasiswa.file5', 'file5.id')
            ->leftJoin('file_syarat_beasiswa as file6', 'pendaftaran_beasiswa.file6', 'file6.id')
            ->leftJoin('file_syarat_beasiswa as file7', 'pendaftaran_beasiswa.file7', 'file7.id')
            ->leftJoin('file_syarat_beasiswa as file8', 'pendaftaran_beasiswa.file8', 'file8.id')
            ->leftJoin('file_syarat_beasiswa as file9', 'pendaftaran_beasiswa.file9', 'file9.id')
            ->leftJoin('file_syarat_beasiswa as file10', 'pendaftaran_beasiswa.file10', 'file10.id')
            ->leftJoin('status_pemrosesan', 'pendaftaran_beasiswa.status', 'status_pemrosesan.id')
            ->where(['pendaftaran_beasiswa.dlt'=> '0', 'pendaftaran_beasiswa.beasiswa_id'=> $this->id])
            // ->where([['aktivitas.dlt',0], ['aktivitas.status',2], ['aktivitas.golongan_skpi_id','<>',null]])
            ->get();
        return $items;
    }

    public function headings(): array
    {
        $beasiswa_field0 = DB::table('beasiswa_field')->where('beasiswa_id', $this->id)->skip(0)->take(1)->first();
        $beasiswa_field1 = DB::table('beasiswa_field')->where('beasiswa_id', $this->id)->skip(1)->take(1)->first();
        $beasiswa_field2 = DB::table('beasiswa_field')->where('beasiswa_id', $this->id)->skip(2)->take(1)->first();
        $beasiswa_field3 = DB::table('beasiswa_field')->where('beasiswa_id', $this->id)->skip(3)->take(1)->first();
        $beasiswa_field4 = DB::table('beasiswa_field')->where('beasiswa_id', $this->id)->skip(4)->take(1)->first();
        $beasiswa_field5 = DB::table('beasiswa_field')->where('beasiswa_id', $this->id)->skip(5)->take(1)->first();
        $beasiswa_field6 = DB::table('beasiswa_field')->where('beasiswa_id', $this->id)->skip(6)->take(1)->first();
        $beasiswa_field7 = DB::table('beasiswa_field')->where('beasiswa_id', $this->id)->skip(7)->take(1)->first();
        $beasiswa_field8 = DB::table('beasiswa_field')->where('beasiswa_id', $this->id)->skip(8)->take(1)->first();
        $beasiswa_field9 = DB::table('beasiswa_field')->where('beasiswa_id', $this->id)->skip(9)->take(1)->first();


        $syarat_beasiswa0 = DB::table('syarat_beasiswa')->where('beasiswa_id', $this->id)->skip(0)->take(1)->first();
        $syarat_beasiswa1 = DB::table('syarat_beasiswa')->where('beasiswa_id', $this->id)->skip(1)->take(1)->first();
        $syarat_beasiswa2 = DB::table('syarat_beasiswa')->where('beasiswa_id', $this->id)->skip(2)->take(1)->first();
        $syarat_beasiswa3 = DB::table('syarat_beasiswa')->where('beasiswa_id', $this->id)->skip(3)->take(1)->first();
        $syarat_beasiswa4 = DB::table('syarat_beasiswa')->where('beasiswa_id', $this->id)->skip(4)->take(1)->first();
        $syarat_beasiswa5 = DB::table('syarat_beasiswa')->where('beasiswa_id', $this->id)->skip(5)->take(1)->first();
        $syarat_beasiswa6 = DB::table('syarat_beasiswa')->where('beasiswa_id', $this->id)->skip(6)->take(1)->first();
        $syarat_beasiswa7 = DB::table('syarat_beasiswa')->where('beasiswa_id', $this->id)->skip(7)->take(1)->first();
        $syarat_beasiswa8 = DB::table('syarat_beasiswa')->where('beasiswa_id', $this->id)->skip(8)->take(1)->first();
        $syarat_beasiswa9 = DB::table('syarat_beasiswa')->where('beasiswa_id', $this->id)->skip(9)->take(1)->first();

        return [
            'NIM', 
            'Nama Mahasiswa',
            'Status Beasiswa',
            'Tanggal Daftar',
            'Program Studi',
            $beasiswa_field0 ? $beasiswa_field0->nama_field : '-',
            $beasiswa_field1 ? $beasiswa_field1->nama_field : '-',
            $beasiswa_field2 ? $beasiswa_field2->nama_field : '-',
            $beasiswa_field3 ? $beasiswa_field3->nama_field : '-',
            $beasiswa_field4 ? $beasiswa_field4->nama_field : '-',
            $beasiswa_field5 ? $beasiswa_field5->nama_field : '-',
            $beasiswa_field6 ? $beasiswa_field6->nama_field : '-',
            $beasiswa_field7 ? $beasiswa_field7->nama_field : '-',
            $beasiswa_field8 ? $beasiswa_field8->nama_field : '-',
            $beasiswa_field9 ? $beasiswa_field9->nama_field : '-',
            $syarat_beasiswa0 ? $syarat_beasiswa0->syarat : '-',
            $syarat_beasiswa1 ? $syarat_beasiswa1->syarat : '-',
            $syarat_beasiswa2 ? $syarat_beasiswa2->syarat : '-',
            $syarat_beasiswa3 ? $syarat_beasiswa3->syarat : '-',
            $syarat_beasiswa4 ? $syarat_beasiswa4->syarat : '-',
            $syarat_beasiswa5 ? $syarat_beasiswa5->syarat : '-',
            $syarat_beasiswa6 ? $syarat_beasiswa6->syarat : '-',
            $syarat_beasiswa7 ? $syarat_beasiswa7->syarat : '-',
            $syarat_beasiswa8 ? $syarat_beasiswa8->syarat : '-',
            $syarat_beasiswa9 ? $syarat_beasiswa9->syarat : '-',
        ];
    }
}
