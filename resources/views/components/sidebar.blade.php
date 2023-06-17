@php
  try {
  $navigations = App\Models\Navigation::all();
  } catch (\Exception $e) {
  $navigations = [];
  Log::error($e->getMessage());
  } 
  @endphp