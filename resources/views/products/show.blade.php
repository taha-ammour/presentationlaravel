@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-slate-600 rounded shadow-md text-white">
    <h1 class="text-2xl font-bold mb-6">Détails du Produit</h1>
    <table class="w-full text-left border bg-red-300 border-none text-slate-900">
        <tr class="bg-red-300">
            <th class="p-3 font-bold underline">Nom</th>
            <td class="p-3">{{ $product->name }}</td>
        </tr>
        <tr>
            <th class="p-3 font-semibold bg-gray-100">Description</th>
            <td class="p-3">{{ $product->description }}</td>
        </tr>
        <tr>
            <th class="p-3 font-semibold bg-gray-100">Prix</th>
            <td class="p-3">{{ $product->price }} €</td>
        </tr>
        <tr>
            <th class="p-3 font-semibold bg-gray-100">Quantité</th>
            <td class="p-3">{{ $product->quantity }}</td>
        </tr>
    </table>
    <div class="mt-6">
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">← Retour à la liste</a>
    </div>
</div>
@endsection
