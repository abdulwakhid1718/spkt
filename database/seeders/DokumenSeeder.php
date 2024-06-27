<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dokumen;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documents = [
            [
                'nama_dokumen' => 'KTP',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP',
                    'Scan/Foto Kartu Keluarga'
                ],
                'logo_dokumen' => 'logo_ktp.png'
            ],
            [
                'nama_dokumen' => 'Buku Tabungan/ATM',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto Buku Tabungan',
                    'Scan/Foto Surat Keterangan/Rekening Koran dari Bank yang Mengeluarkan Buku Tabungan'
                ],
                'logo_dokumen' => 'logo_atm.png'
            ],
            [
                'nama_dokumen' => 'SIM',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto SIM',
                    'Scan/Foto Surat Rekomendasi SIM dari Satpas Setempat'
                ],
                'logo_dokumen' => 'logo_sim.png'
            ],
            [
                'nama_dokumen' => 'BPJS',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto BPJS'
                ],
                'logo_dokumen' => 'logo_bpjs.png'
            ],
            [
                'nama_dokumen' => 'STNK',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto BPKB',
                    'Scan/Foto Surat Keterangan dari Bank (Jika Digadai)'
                ],
                'logo_dokumen' => 'logo_stnk.png'
            ],
            [
                'nama_dokumen' => 'Ijasah/STTB',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto Ijazah/STTB',
                    'Scan/Foto Surat Keterangan dari Sekolah atau Dinas Pendidikan'
                ],
                'logo_dokumen' => 'logo_ijazah.png'
            ],
            [
                'nama_dokumen' => 'Bukti Gadai',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto Pengantar dari Pegadaian'
                ],
                'logo_dokumen' => 'logo_bukti_gadai.png'
            ],
            [
                'nama_dokumen' => 'Resi Pengambilan BPKB',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto STNK'
                ],
                'logo_dokumen' => 'logo_resi_bpkb.png'
            ],
            [
                'nama_dokumen' => 'NPWP',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto NPWP',
                    'Scan/Foto No. NPWP Dari Kantor Pajak'
                ],
                'logo_dokumen' => 'logo_npwp.png'
            ],
            [
                'nama_dokumen' => 'Akte Kelahiran',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto Akte Kelahiran',
                    'Apabila tidak ada dapat dimintakan No. Akte ke Dukcapil'
                ],
                'logo_dokumen' => 'logo_akte_kelahiran.png'
            ],
            [
                'nama_dokumen' => 'Buku Nikah',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto Surat Pengantar KUA'
                ],
                'logo_dokumen' => 'logo_buku_nikah.png'
            ],
            [
                'nama_dokumen' => 'Kroya BANK',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Foto Copy Sertifikat Tanah yang dijaminkan',
                    'Surat Pengantar dari Bank yang menerbitkan Kroya'
                ],
                'logo_dokumen' => 'logo_kroya_bank.png'
            ],
            [
                'nama_dokumen' => 'Kartu Tanda Mahasiswa & Kartu Rencana Study',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto Surat Keterangan Aktif Kuliah dari Kampus'
                ],
                'logo_dokumen' => 'logo_ktp.png'
            ],
            [
                'nama_dokumen' => 'SIM Card Seluler',
                'dokumen_persyaratan' => [
                    'Scan/Foto KTP/Kartu Keluarga',
                    'Scan/Foto Surat Keterangan Dari Provider'
                ],
                'logo_dokumen' => 'logo_ktp.png'
            ],
            [
                'nama_dokumen' => 'Surat Pembelian Emas',
                'dokumen_persyaratan' => [
                    'Scan/Foto Surat Keterangan Pembelian Dari Toko Emas'
                ],
                'logo_dokumen' => 'logo_ktp.png'
            ],
        ];

        foreach ($documents as $document) {
            Dokumen::create([
                'nama_dokumen' => $document['nama_dokumen'],
                'dokumen_persyaratan' => json_encode($document['dokumen_persyaratan']),
                'logo_dokumen' => $document['logo_dokumen'],
            ]);
        }
    }
}
