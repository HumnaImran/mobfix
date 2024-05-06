<form id="deliveryServiceForm" action="{{ route('processDeliveryService') }}" method="post">
    @csrf
    <!-- Add form fields for delivery service selection, e.g., radio buttons, dropdowns, etc. -->
    <label for="deliveryService">Select Delivery Service:</label>
    <select name="deliveryService" id="deliveryService">
        <!-- Add options for different delivery services -->
        <option value="leopard">Leopard</option>
        <!-- Add more options as needed -->
    </select>

    <button type="submit">Submit</button>
</form>
