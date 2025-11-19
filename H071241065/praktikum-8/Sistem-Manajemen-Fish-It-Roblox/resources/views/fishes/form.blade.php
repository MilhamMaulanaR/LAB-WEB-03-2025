<div class="space-y-3">
  <div>
    <label class="block text-sm font-semibold">Nama Ikan</label>
    <input type="text" name="name" value="{{ old('name', $fish->name ?? '') }}" class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm font-semibold">Rarity</label>
    <select name="rarity" class="w-full border rounded px-3 py-2">
      @foreach($rarities as $r)
        <option value="{{ $r }}" {{ old('rarity', $fish->rarity ?? '') == $r ? 'selected' : '' }}>{{ $r }}</option>
      @endforeach
    </select>
  </div>

  <div class="grid grid-cols-2 gap-3">
    <div>
      <label class="block text-sm font-semibold">Berat Min (kg)</label>
      <input type="number" step="0.01" name="base_weight_min" value="{{ old('base_weight_min', $fish->base_weight_min ?? '') }}" class="w-full border rounded px-3 py-2">
    </div>
    <div>
      <label class="block text-sm font-semibold">Berat Max (kg)</label>
      <input type="number" step="0.01" name="base_weight_max" value="{{ old('base_weight_max', $fish->base_weight_max ?? '') }}" class="w-full border rounded px-3 py-2">
    </div>
  </div>

  <div>
    <label class="block text-sm font-semibold">Harga/kg</label>
    <input type="number" name="sell_price_per_kg" value="{{ old('sell_price_per_kg', $fish->sell_price_per_kg ?? '') }}" class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm font-semibold">Peluang Tertangkap (%)</label>
    <input type="number" step="0.01" name="catch_probability" value="{{ old('catch_probability', $fish->catch_probability ?? '') }}" class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm font-semibold">Deskripsi</label>
    <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $fish->description ?? '') }}</textarea>
  </div>
</div>

@if ($errors->any())
  <div class="bg-red-100 text-red-700 border border-red-400 p-2 mt-3 rounded">
    <ul class="list-disc pl-5">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
