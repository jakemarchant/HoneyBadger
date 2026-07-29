<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color: #12100b; background: #fffaf0; margin: 0; padding: 2rem;">
    <div style="max-width: 560px; margin: 0 auto; background: #ffffff; border: 1px solid #e5d9c0; padding: 2rem;">
        <h1 style="font-size: 1.3rem; margin-top: 0;">New enquiry from thehoneybadgernorwich.co.uk</h1>

        <p><strong>Name:</strong> {{ $enquiry['name'] }}</p>
        <p><strong>Email:</strong> {{ $enquiry['email'] }}</p>
        <p><strong>Phone:</strong> {{ $enquiry['phone'] ?: 'Not provided' }}</p>
        <p><strong>Enquiry type:</strong> {{ $enquiry['enquiry_type'] }}</p>
        <p><strong>Message:</strong><br>{{ $enquiry['message'] ?: 'No message provided.' }}</p>

        <p style="margin-top: 2rem;">
            <a href="mailto:{{ $enquiry['email'] }}" style="background: #c4973a; color: #12100b; padding: 10px 18px; text-decoration: none; font-weight: bold;">
                Reply to {{ $enquiry['name'] }}
            </a>
        </p>

        <p style="margin-top: 2rem; font-size: .82rem; color: #6b6456;">
            Sent from the reservations form on the HoneyBadger Norwich website.
        </p>
    </div>
</body>
</html>
