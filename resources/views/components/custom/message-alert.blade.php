<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

</div>
