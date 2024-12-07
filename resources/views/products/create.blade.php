@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded shadow-md">
    <h1 class="text-2xl font-bold mb-6">Créer un Produit</h1>
    <form method="POST" action="{{ route('products.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Nom :</label>
            <input type="text" name="name" value="{{ old('name') }}" class="border p-2 w-full rounded" required>
            @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold">Description :</label>
            <textarea name="description" class="border p-2 w-full rounded">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold">Prix :</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="border p-2 w-full rounded" required>
            @error('price') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold">Quantité :</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" class="border p-2 w-full rounded" required>
            @error('quantity') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection
