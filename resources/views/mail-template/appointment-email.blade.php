<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" style="margin: 0 auto; padding: 20px;">
        <tr>
            <td align="center">
                <!-- Email container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #3B82F6; padding: 20px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0;">{{ $subject }}</h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style="padding: 20px; text-align: left;">
                            <table width="100%" cellpadding="10" cellspacing="0" style="font-size: 16px; color: #333333; border-collapse: collapse;">
                                <tr>
                                    <td style="border-bottom: 1px solid #ddd;">Name:</td>
                                    <td style="border-bottom: 1px solid #ddd;">{{ $name }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 1px solid #ddd;">Address:</td>
                                    <td style="border-bottom: 1px solid #ddd;">{{ $address }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 1px solid #ddd;">Email:</td>
                                    <td style="border-bottom: 1px solid #ddd;">{{ $email }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 1px solid #ddd;">Description:</td>
                                    <td style="border-bottom: 1px solid #ddd;">{{ $description }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 1px solid #ddd;">Date:</td>
                                    <td style="border-bottom: 1px solid #ddd;">{{ $date }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-top: 20px; text-align: center;">
                                        <!-- Display QR Code using the public URL -->
                                        <img src="{{ $qrcodeUrl }}" alt="QR Code" style="max-width: 200px;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f4f4f4; padding: 10px; text-align: center;">
                            <p style="font-size: 12px; color: #888888;">Thank you for reading this email.</p>
                        </td>
                    </tr>
                </table>
                <!-- End of Email container -->
            </td>
        </tr>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" style="margin: 0 auto; padding: 20px;">
        <tr>
            <td align="center">
                <!-- Email container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #3B82F6; padding: 20px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0;">{{ $subject }}</h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style="padding: 20px; text-align: left;">
                            <table width="100%" cellpadding="10" cellspacing="0" style="font-size: 16px; color: #333333; border-collapse: collapse;">
                                <tr>
                                    <td style="border-bottom: 1px solid #ddd;">Name:</td>
                                    <td style="border-bottom: 1px solid #ddd;">{{ $name }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 1px solid #ddd;">Address:</td>
                                    <td style="border-bottom: 1px solid #ddd;">{{ $address }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 1px solid #ddd;">Email:</td>
                                    <td style="border-bottom: 1px solid #ddd;">{{ $email }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 1px solid #ddd;">Description:</td>
                                    <td style="border-bottom: 1px solid #ddd;">{{ $description }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 1px solid #ddd;">Date:</td>
                                    <td style="border-bottom: 1px solid #ddd;">{{ $date }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-top: 20px; text-align: center;">
                                        <!-- Display QR Code using the public URL -->
                                        <img src="{{ $qrcodeUrl }}" alt="QR Code" style="max-width: 200px;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f4f4f4; padding: 10px; text-align: center;">
                            <p style="font-size: 12px; color: #888888;">Thank you for reading this email.</p>
                        </td>
                    </tr>
                </table>
                <!-- End of Email container -->
            </td>
        </tr>
    </table>
</body>
</html>
