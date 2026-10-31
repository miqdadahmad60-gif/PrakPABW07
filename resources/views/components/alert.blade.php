@props(['type' => 'success', 'message'])

<div style="padding: 12px; margin-bottom: 20px; border-radius: 4px; background-color: {{ $type == 'success' ? '#d4edda' : '#f8d7da' }}; color: {{ $type == 'success' ? '#155724' : '#721c24' }}; border: 1px solid {{ $type == 'success' ? '#c3e6cb' : '#f5c6cb' }};">
    <strong>{{ $type == 'success' ? 'Berhasil!' : 'Perhatian!' }}</strong> {{ $message }}
</div>