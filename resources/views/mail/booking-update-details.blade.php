<table style="width: 100%; font-size: 16px; color: #555555; margin-top: 20px;">
    <tr><td><strong>Warehouse:</strong></td><td>{{ $mail_data['warehouse'] }}</td></tr>
    <tr><td><strong>Tenant Name:</strong></td><td>{{ $mail_data['tenant_name'] }}</td></tr>
    <tr><td><strong>Landlord Name:</strong></td><td>{{ $mail_data['landlord_name'] }}</td></tr>
    <tr><td><strong>No of Pallets:</strong></td><td>{{ $mail_data['pallets'] }}</td></tr>
    <tr><td><strong>Tenancy Date:</strong></td><td>{{ $mail_data['tenancy_date'] }}</td></tr>
    <tr><td><strong>Renewal Date:</strong></td><td>{{ $mail_data['renewal_date'] }}</td></tr>
    <tr><td><strong>Total Rent:</strong></td><td><strong>{{ number_format($mail_data['total_rent'], 2) ?? 'Pending'}}<strong></td></tr>
    <tr><td><strong>Status:</strong></td><td><strong>{{ $mail_data['status'] }}</strong></td></tr>
</table>