@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="p-6 border-b">
        <h2 class="text-lg font-bold text-gray-800">Data Booking</h2>
        <p class="text-sm text-gray-500">Daftar semua booking dari pengunjung</p>
    </div>

    @if($bookings->isEmpty())
        <div class="p-12 text-center text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <p>Belum ada data booking</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengunjung</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paket</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($bookings as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $booking->user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $booking->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->package->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->booking_date->format('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form method="POST" action="{{ route('admin.booking.status', $booking) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()"
                                        class="text-xs font-semibold rounded-full px-3 py-1.5 border-0 focus:ring-2 focus:ring-primary cursor-pointer
                                        @if($booking->status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($booking->status === 'process') bg-blue-100 text-blue-800
                                        @elseif($booking->status === 'accepted') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800 @endif">
                                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="process" {{ $booking->status === 'process' ? 'selected' : '' }}>Process</option>
                                        <option value="accepted" {{ $booking->status === 'accepted' ? 'selected' : '' }}>Accept</option>
                                        <option value="rejected" {{ $booking->status === 'rejected' ? 'selected' : '' }}>Reject</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
