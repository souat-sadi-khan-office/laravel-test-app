<div class="dropdown">
    <a class="btn btn-outline-primary btn-sm dropdown-toggle" href="javascript:;" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        Action
    </a>
  
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li>
            <a class="dropdown-item" href="{{ route('admin.order.details', $model['id']) }}" target="_blank">
                <i class="bi bi-eye"></i>
                View
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('admin.order.invoice',['id' => $model['id'], 'download' => true])}}">
                <i class="bi bi-box-arrow-down"></i>
               Invoice
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('admin.order.invoice',$model['id'])}}" ><i
                class="bi bi-receipt"></i> Print</a>
        </li>
        {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
    </ul>
</div>