<?php

class Mahasiswa
{
    public $nim;
    public $nama;
    public $kuliah;
    public $mata_kuliah;
    public $nilai;
    public $grade;
    public $predikat;
    public $status;

    //fungsi menggunakan metode Post
    public function __construct($nim, $nama, $kuliah, $mata_kuliah, $nilai)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->kuliah = $kuliah;
        $this->mata_kuliah = $mata_kuliah;
        $this->nilai = $nilai;
        $this->hitungGrade();
        $this->hitungPredikat();
        $this->hitungStatus();
    }

    private function hitungGrade()
    {
        if ($this->nilai >= 85) {
            $this->grade = 'A';
        } elseif ($this->nilai >= 75) {
            $this->grade = 'B';
        } elseif ($this->nilai >= 60) {
            $this->grade = 'C';
        } elseif ($this->nilai >= 40) {
            $this->grade = 'D';
        } else {
            $this->grade = 'E';
        }
    }

    private function hitungPredikat()
    {
        switch ($this->grade) {
            case 'A':
                $this->predikat = 'Sangat Memuaskan';
                break;
            case 'B':
                $this->predikat = 'Memuaskan';
                break;
            case 'C':
                $this->predikat = 'Cukup';
                break;
            case 'D':
                $this->predikat = 'Kurang';
                break;
            default:
                $this->predikat = 'Sangat Kurang';
                break;
        }
    }

    private function hitungStatus()
    {
        $this->status = ($this->nilai >= 65) ? 'Lulus' : 'Tidak Lulus';
    }
}
