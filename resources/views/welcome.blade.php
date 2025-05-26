@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="glass-card mb-8 md:mb-0 md:mr-8">
            <h2 class="text-2xl font-semibold mb-6">Record New Visit</h2>
            <form action="{{ route('visits.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}" 
                           placeholder="Enter your name"
                           required>
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           placeholder="Enter your email"
                           required>
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="purpose">Purpose of Visit</label>
                    <textarea id="purpose" 
                              name="purpose" 
                              rows="4" 
                              placeholder="Describe the purpose of your visit"
                              required>{{ old('purpose') }}</textarea>
                    @error('purpose')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-chess">
                        Record Visit
                    </button>
                </div>
            </form>
        </div>

        <div class="glass-card">
            <h2 class="text-2xl font-semibold mb-6">Recent Visits</h2>
            @if($visits->count() > 0)
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Purpose</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visits as $visit)
                                <tr>
                                    <td>{{ $visit->name }}</td>
                                    <td>{{ $visit->email }}</td>
                                    <td>{{ $visit->purpose }}</td>
                                    <td>{{ $visit->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center py-8 text-gray-600">No visits recorded yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
