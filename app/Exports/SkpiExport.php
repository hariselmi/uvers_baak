<?php
namespace App\Exports;

use App\Skpi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SkpiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $items = Skpi::select('mahasiswa.nim', 'mahasiswa.nama as namamahasiswa', 'golongan_skpi.name as golongan_skpi','kategori_pelaporan.name as kategori_pelaporan', 'nama_kegiatan', 'peran', 'penyelenggara', 'tgl_mulai', 'tgl_selesai', 'kategori_kegiatan.name as kategori','jenis_kepesertaan.name as jenis_kepesertaan', 'jml_peserta','capaian_prestasi.name as capaian_prestasi', 'laman_penyelenggara', 'keterangan')
        ->leftJoin('kategori_kegiatan', 'aktivitas.kategori', 'kategori_kegiatan.id')
        ->leftJoin('kategori_pelaporan', 'aktivitas.jenis_aktivitas', 'kategori_pelaporan.id')
        ->leftJoin('golongan_skpi', 'aktivitas.golongan_skpi_id', 'golongan_skpi.id')
        ->leftJoin('jenis_kepesertaan', 'aktivitas.jenis', 'jenis_kepesertaan.id')
        ->leftJoin('capaian_prestasi', 'aktivitas.capaian', 'capaian_prestasi.id')
        ->leftJoin('users', 'aktivitas.user_id', 'users.id')
        ->leftJoin('mahasiswa', 'users.mahasiswa_id', 'mahasiswa.id')
        ->where([['aktivitas.dlt',0], ['aktivitas.status',2], ['aktivitas.golongan_skpi_id','<>',null]])
        ->get();
        return $items;
    }

    public function headings(): array
    {
        return [
            'nim', 'namamahasiswa', 'kategori_pelaporan', 'golongan_skpi', 'nama_kegiatan', 'peran', 'penyelenggara', 'tgl_mulai', 'tgl_selesai', 'kategori', 'jenis_kepesertaan', 'jml_peserta', 'capaian_prestasi', 'laman_penyelenggara', 'keterangan'
        ];
    }
}