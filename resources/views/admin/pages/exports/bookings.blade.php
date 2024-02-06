<table>
   <tr>
      <th>ID</th>
      <th>Services</th>
      <th>Phone Number</th>
      <th>Full Name</th>
      <th>Email</th>
      <th>Area</th>
      <th>Block</th>
      <th>Street</th>
      <th>Avenue</th>
      <th>House</th>
      <th>Floor</th>
      <th>Additional Detail</th>
      <th>Payment Method</th>
      <th>Place Date</th>
      <th>Time</th>
      <th>Status</th>
      <th>Total Amount</th>
      <th>Created At</th>
   </tr>
   @foreach($bookings as $booking)
   <tr>
      <td>{{ $booking->id }}</td>
      <td>
      @foreach($booking->services as $service)
        {{ $service->getTranslations('name')['en'] }},
        @endforeach
    </td>
      <td>{{ $booking->phone_number }}</td>
      <td>{{ $booking->full_name }}</td>
      <td>{{ $booking->email }}</td>
      <td>{{ $booking->area }}</td>
      <td>{{ $booking->block }}</td>
      <td>{{ $booking->street }}</td>
      <td>{{ $booking->avenue }}</td>
      <td>{{ $booking->house }}</td>
      <td>{{ $booking->floor }}</td>
      <td>{{ $booking->additional_detail }}</td>
      <td>{{ $booking->payment_method }}</td>
      <td>{{ $booking->place_date }}</td>
      <td>{{ $booking->time }}</td>
      <td>{{ $booking->status }}</td>
      <td>{{ $booking->total_amount }}</td>
      <td>{{ $booking->created_at }}</td>
   </tr>
   @endforeach
</table>