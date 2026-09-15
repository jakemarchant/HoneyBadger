<x-layouts::app :title="__('Dashboard')">
    @can('access-admin')
        @php
            $unreadEnquiries = \App\Models\Enquiry::unread()->count();
            $totalPages = \App\Models\Page::count();
            $adminUsers = \App\Models\User::where('is_admin', true)->count();
            $recentEnquiries = \App\Models\Enquiry::query()->latest()->take(5)->get();
        @endphp

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Dashboard') }}</h1>
        </div>
        <p class="text-muted">{{ __('Manage page content, enquiries and admin users.') }}</p>

        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <a class="text-decoration-none" href="{{ route('admin.enquiries.index') }}" wire:navigate>
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Unread enquiries') }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $unreadEnquiries }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <a class="text-decoration-none" href="{{ route('admin.pages.index') }}" wire:navigate>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('Pages') }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPages }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <a class="text-decoration-none" href="{{ route('admin.users.index') }}" wire:navigate>
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('Admin users') }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adminUsers }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Recent enquiries') }}</h6>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.enquiries.index') }}" wire:navigate>{{ __('View all') }}</a>
            </div>
            <div class="card-body p-0">
                @forelse ($recentEnquiries as $enquiry)
                    <div class="d-flex align-items-center justify-content-between px-4 py-3 border-bottom">
                        <div>
                            <div class="font-weight-bold text-gray-800">{{ $enquiry->name }}</div>
                            <div class="small text-gray-500">{{ $enquiry->enquiry_type }} &middot; {{ $enquiry->created_at->diffForHumans() }}</div>
                        </div>
                        @unless ($enquiry->read_at)
                            <span class="badge badge-warning">{{ __('Unread') }}</span>
                        @endunless
                    </div>
                @empty
                    <div class="px-4 py-5 text-center text-gray-500">{{ __('No enquiries yet.') }}</div>
                @endforelse
            </div>
        </div>
    @else
        <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 60vh;">
            <h1 class="h3 text-gray-800">{{ __('Welcome, :name', ['name' => auth()->user()->name]) }}</h1>
            <p class="text-muted">{{ __("You're signed in. Ask an admin if you need access to more.") }}</p>
        </div>
    @endcan
</x-layouts::app>
