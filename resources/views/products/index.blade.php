@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Liste des Produits</h1>

    <form method="GET" action="{{ route('products.index') }}" class="mb-6 flex items-center gap-4">
        <input type="text" name="search" placeholder="Rechercher un produit" value="{{ request('search') }}" class="border p-2 rounded w-full">
        <select name="sort_by" class="border p-2 rounded">
            <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Prix</option>
            <option value="quantity" {{ request('sort_by') == 'quantity' ? 'selected' : '' }}>Quantité</option>
        </select>
        <select name="sort_order" class="border p-2 rounded">
            <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascendant</option>
            <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descendant</option>
        </select>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Appliquer</button>
    </form>

    @if(session('success'))
        <p class="text-green-600 mb-4">{{ session('success') }}</p>
    @endif

    <table class="w-full border-collapse border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 border">Nom</th>
                <th class="p-3 border">Description</th>
                <th class="p-3 border">Prix</th>
                <th class="p-3 border">Quantité</th>
                <th class="p-3 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="hover:bg-gray-50">
                <td class="p-3 border">{{ $product->name }}</td>
                <td class="p-3 border">{{ $product->description }}</td>
                <td class="p-3 border">{{ $product->price }} €</td>
                <td class="p-3 border">{{ $product->quantity }}</td>
                <td class="p-3 border flex gap-2">
                    <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:underline">Voir</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-500 hover:underline">Modifier</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection
