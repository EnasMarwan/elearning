<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        @if($new > 0)
            <span class="badge badge-success badge-counter">{{ $new }}</span>
        @endif
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Notifications
        </h6>

        @foreach($notifications as $notification)
    <a class="dropdown-item d-flex align-items-center" href="{{ $notification->data['url'] }}?notify_id={{ $notification->id }}">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fa fa-bell" style="color: white;font-size:20px;"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{ $notification->data['title'] }}</div>
                    <span class="font-weight-bold">{{ $notification->data['body'] }}</span>
                </div>
            </a>
        @endforeach
        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
    </div>
</li>