<?php
namespace App\Exports;

use App\Skpi;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SkpiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $items = Skpi::select('mahasiswa.nim', 'mahasiswa.nama as namamahasiswa', 'prodi.name as prodi','kategori_pelaporan.name as jenis_aktivitas', 'golongan_skpi.name as golongan_skpi', 'nama_kegiatan', 'peran', 'penyelenggara', 'tgl_mulai', 'tgl_selesai', 'kategori_kegiatan.name as kategori','jenis_kepesertaan.name as jenis_kepesertaan', 'jml_peserta','capaian_prestasi.name as capaian_prestasi', 'laman_penyelenggara', 'keterangan', DB::raw("concat(aktivitas.site, '/document/certificate/', aktivitas.sertifikat) as file_sertifikat"), DB::raw("concat(aktivitas.site, '/document/award/', aktivitas.foto_penghargaan) as file_foto_penghargaan"), DB::raw("concat(aktivitas.site, '/document/letter/', aktivitas.surat_lomba) as file_surat_tugas"), 'status_aktivitas.name as status')
        ->leftJoin('kategori_kegiatan', 'aktivitas.kategori', 'kategori_kegiatan.id')
        ->leftJoin('kategori_pelaporan', 'aktivitas.jenis_aktivitas', 'kategori_pelaporan.id')
        ->leftJoin('golongan_skpi', 'aktivitas.golongan_skpi_id', 'golongan_skpi.id')
        ->leftJoin('jenis_kepesertaan', 'aktivitas.jenis', 'jenis_kepesertaan.id')
        ->leftJoin('capaian_prestasi', 'aktivitas.capaian', 'capaian_prestasi.id')
        ->leftJoin('users', 'aktivitas.user_id', 'users.id')
        ->leftJoin('mahasiswa', 'users.mahasiswa_id', 'mahasiswa.id')
        ->leftJoin('prodi', 'mahasiswa.prodi', 'prodi.id')
        ->leftJoin('status_aktivitas', 'aktivitas.status', 'status_aktivitas.id')
        ->where('aktivitas.dlt',0)
        // ->where([['aktivitas.dlt',0], ['aktivitas.status',2], ['aktivitas.golongan_skpi_id','<>',null]])
        ->get();
        return $items;
    }

    public function headings(): array
    {
        return [
            'nim', 'namamahasiswa', 'prodi', 'jenis_aktivitas', 'golongan_skpi', 'nama_kegiatan', 'peran', 'penyelenggara', 'tgl_mulai', 'tgl_selesai', 'kategori', 'jenis_kepesertaan', 'jml_peserta', 'capaian_prestasi', 'laman_penyelenggara', 'keterangan', 'file_sertifikat', 'file_foto_penghargaan', 'file_surat_tugas', 'status'
        ];
    }
}