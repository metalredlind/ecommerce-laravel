
<div class="tab-pane fade" id="list-banner-4" role="tabpanel" aria-labelledby="list-banner-4-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.email-setting-update')}}" method="POST">
                @csrf
                @method('PUT')

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>