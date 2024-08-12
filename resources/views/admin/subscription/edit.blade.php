<x-admin>
    @section('title', 'Add Subscription')
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title">Add Subscription</h3>
            <div class="card-tools"><a href="{{ route('admin.subscription.index') }}" class="btn btn-sm btn-dark">Back</a></div>
        </div>
        <div class="card-body">
        <div class="col-md-3 required"><span>Details of Description Plan<br></span></div>  
            <form action="{{ route('admin.subscription.update') }}" method="POST">
            @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Name:*</label>
                            <input type="text" class="form-control" name="name" required
                                value="{{ $data->name }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Email" class="form-label">MRP($):*</label>
                            <input type="text" class="form-control" name="mrp" required
                                value="{{ $data->mrp }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Email" class="form-label">Sale Price($):*</label>
                            <input type="text" class="form-control" name="sale_price" required
                                value="{{ $data->price }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Email" class="form-label">Monthly Price($):*</label>
                            <input type="text" class="form-control" name="monthly_price" required
                                value="{{ $data->monthly_price }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role" class="form-label">Status:*</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="" selected>Status</option>
                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
		        		<div class="col-md-12">	 
   				        	<div class="form-group ">
						       <table class="table prodcutPriceTbl table-bordered no-footer mb0">
                                    <tr>
                                        <th width="70%">Description</th>
                                        <th width="15%">Status</th>
                                        <th width="15%" class="text-center">Action</th>
                                    </tr>
                                    @foreach ($items['descriptions'] as $key => $value)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control prddocs" name="description[]" style="overflow: hidden;" value="{{ $value }}" required />
                                        </td>
                                        <td>
                                            <select name="statuses[]" id="status" class="form-control" required>
                                                <option value="" selected>Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" onClick="addRemoveProductTablBox(this, 'add')" class="addMoreTbl">&#10133;</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
       					<div class="input-group-prepend"></div>
                            <button type="submit" class="btn btn-primary btn-md subBtn">Submit</button>
 	   				    </div>
				</div>
			</div>    
            </form>
        </div>
    </div>
</x-admin>
<script>
function productTable() {
    return '<tr>' +
       
        '<td>' +
        '<input type="text" class="form-control prddocs" name="description[]" required />' +
        '</td>' +
        '<td>' +
        '<select name="status" id="status" class="form-control" required>' +
            '<option value="" selected>Status</option>' +
            '<option value="1" Active>Active</option>' +
            '<option value="0" Active>Inactive</option>' +
            '</select>' +
        '</td>' +
        '<td class="text-center">' +
        '<button type="button" onClick="addRemoveProductTablBox(this, \'remove\')" class="removeMoreTbl">&#x2796</button>' +
        '</td>' +
        '</tr>';
}



function addRemoveProductTablBox(selfObj, type) {
    if (type === 'add') {
        // Append a new row
        $(selfObj).closest('tr').after(productTable());
    } else if (type === 'remove') {
        // Remove the row only if there's more than one
         if (confirm('Are you sure you want to delete this row?')) {
        if ($('.prodcutPriceTbl tr').length > 2) {
            $(selfObj).closest('tr').remove();
        }
    }
    }
}

</script>