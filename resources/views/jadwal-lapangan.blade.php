@extends('layouts.main')
@section('konten')
    <div class="konten-layout py-3 px-2">
        <div class="text-center">
            <h2 class="font-semibold text-lg lg:text-2xl">Jadwal Lapangan</h2>
        </div>
        <div class="mt-10">
            <form action="">
                
            <div class="text-center">
                <label class="block">Pilih Tanggal</label>
                <input class="input-form" type="date" name="date" data-date-inline-picker="true" id="date">
            </div>
            <div class="text-center mt-5">
                <label class="block">Lapangan Futsal</label>
                <select class="border-slate-400 py-2 px-3 shadow-md md:shadow-lg border-solid border-2 rounded-lg text-center" name="lapangan" id="lapangan">
                    <option class="text-[12px] lg:text-lg" value="1">Lapangan 1</option>
                </select>
            </div>
            <div class="text-center mt-5">
                <button class="border-2 border-slate-300 py-1 px-2 rounded-lg bg-yellow-500 hover:bg-yellow-400" type="button" id="btnCari">Cari</button>
            </div>
        </form>
        </div>
        <div class="mt-10 mb-[90px] lg:w-[900px] bg-yellow-500 lg:mx-auto">
            <div class="bg-primary" >
            <table class="table-auto border-slate-600 text-center w-full text-white">
                <thead class="border-line bg-slate-700 ">
                    <tr>
                        <td class="border-line">Tanggal</td>
                        <td class="border-line">Nama</td>
                        <td class="border-line">Waktu</td>
                        <td class="border-line">Durasi</td>
                    </tr>
                </thead>
                <tbody id="table-jadwal">
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>

<script src="/Javascript/cariJadwal.js"></script>
@endsection