<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <ul>
            <p>Nama: {{$name}}</p>
            <p>kelas:{{$kelas}}</p>
            <p>linkedin <p> <a href={{$linkedin}}> Aurell on linkedin </a>
            <p>repository: {{$repository}}
        </ul>
    </div>
 </x-layout>
