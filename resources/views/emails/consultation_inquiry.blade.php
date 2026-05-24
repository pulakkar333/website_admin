<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 80%; margin: 20px auto; padding: 20px; border: 1px solid #eee; border-radius: 10px; }
        .header { background: #081953; color: white; padding: 10px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { padding: 20px; }
        .footer { font-size: 12px; color: #777; margin-top: 20px; text-align: center; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div className="container">
        <div className="header">
            <h2>New Consultation Inquiry</h2>
        </div>
        <div className="content">
            <p>You have received a new consultation request. Here are the details:</p>
            <table>
                <tr><th>Full Name</th><td>{{ $requestData->full_name }}</td></tr>
                <tr><th>Organization</th><td>{{ $requestData->organization_name }}</td></tr>
                <tr><th>Email</th><td>{{ $requestData->email }}</td></tr>
                <tr><th>Phone</th><td>{{ $requestData->phone }}</td></tr>
                <tr><th>Topic</th><td>{{ $requestData->topic_of_inquiry }}</td></tr>
                <tr><th>Message</th><td>{{ $requestData->message ?? 'No message provided' }}</td></tr>
            </table>
        </div>
        <div className="footer">
            <p>This inquiry was submitted from GME Website.</p>
        </div>
    </div>
</body>
</html>