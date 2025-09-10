<select class="select">
    <option>Walk in Customer</option>
    @foreach($customers as $customer)
        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
    @endforeach
</select>
