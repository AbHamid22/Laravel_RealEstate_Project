use App\Models\Customer;
use App\Models\Property;

Route::get('/api/customer/{id}', function ($id) {
    return Customer::find($id);
});

Route::get('/api/property/{id}', function ($id) {
    return Property::find($id);
});








<script>
    document.querySelector("#customer_id").addEventListener("change", async function () {
        const customerId = this.value;
        if (customerId !== "select") {
            const res = await fetch(`/api/customer/${customerId}`);
            const customer = await res.json();

            let html = `
                <strong>Name:</strong> ${customer.name} <br>
                <strong>Phone:</strong> ${customer.phone || ''} <br>
                <strong>Email:</strong> ${customer.email || ''} <br>
                <strong>Address:</strong> ${customer.address || ''}
            `;

            document.querySelector("#customer-info").innerHTML = html;
        } else {
            document.querySelector("#customer-info").innerHTML = '';
        }
    });

    document.querySelector("#property_id").addEventListener("change", async function () {
        const propertyId = this.value;
        if (propertyId !== "select") {
            const res = await fetch(`/api/property/${propertyId}`);
            const property = await res.json();

            // If your property model has amount, you can autofill
            if (property.amount) {
                document.querySelector("#txtPrice").value = property.amount;
            }

            // Optional: autofill project_id if available
            if (property.project_id) {
                document.querySelector("#project_id").value = property.project_id;
            }
        }
    });
</script>
