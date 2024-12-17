<section>
    <header>
        <h2 class="text-lg font-medium sd text-gray-900">
            {{ __('Referral Email Form') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Enter email addresses separated by commas. Each email will turn into a bubble.') }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.send.referral.email') }}" class="mt-6 space-y-6">
        @csrf

        <!-- Bubble Input Field -->
         <div class="mb-3">
            <label for="email_tags" class="form-label">Email Addresses</label>
            <input type="text" id="email_tags" name="email_list" data-role="tagsinput" class="form-control" placeholder="Add emails">
            <small class="form-text text-muted">Press comma or Enter to add an email as a tag.</small>
        </div>

        <!-- Send Referral Email Button -->
        <div class="flex items-center gap-4">
            <button class="btn btn-primary btn-sm btn_tn" type="submit">{{ __('Send Referral Email') }}</button>
        </div>
    </form>
</section>
<script>
   $(document).ready(function () {
    $('#email_tags').tagsinput({
        trimValue: true, // Automatically trims whitespace around tags
        confirmKeys: [13, 188], // Enter (13) and Comma (188) to confirm tags
        maxTags: 10 // Optional: Limit the number of tags
    });
});

</script>
<style>
.bootstrap-tagsinput {
    width: 100%;
    min-height: 40px;
    padding: 6px 12px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    display: flex;
    flex-wrap: wrap;
}

.bootstrap-tagsinput .tag {
    margin-right: 5px;
    color: #fff;
    background-color: #007bff;
    padding: 5px 10px;
    border-radius: 15px;
}

.bootstrap-tagsinput .tag [data-role="remove"] {
    margin-left: 5px;
    cursor: pointer;
}


</style>