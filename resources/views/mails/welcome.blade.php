{{-- resources/views/emails/animated-welcome.blade.php --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Service</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Header with gradient animation */
        .email-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }

        .email-header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        /* Content sections */
        .email-content {
            padding: 30px;
        }

        .welcome-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-section h2 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 24px;
        }

        /* Feature grid with hover effects */
        .features-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 30px 0;
        }

        .feature-item {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            border-left: 4px solid #667eea;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: #e9ecef;
            transform: translateY(-2px);
        }

        /* Animated button */
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            margin: 20px 0;
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        /* Offer section with pulse animation */
        .offer-section {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin: 30px 0;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Footer */
        .email-footer {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            text-align: center;
            font-size: 14px;
        }

        .social-links {
            margin: 15px 0;
        }

        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #ecf0f1;
            text-decoration: none;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .features-grid {
                grid-template-columns: 1fr;
            }

            .email-content {
                padding: 20px;
            }
        }

        /* Email client specific fixes */
        .outlook-fix {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>🎉 Welcome Aboard, {{ $user->name }}!</h1>
            <p>We're excited to have you join our community</p>
        </div>

        <!-- Main Content -->
        <div class="email-content">
            <div class="welcome-section">
                <h2>Get Ready for an Amazing Experience</h2>
                <p>Thank you for signing up! Here's what you can do next:</p>
            </div>

            <!-- Features Grid -->
            <div class="features-grid">
                <div class="feature-item">
                    <h3>🚀 Explore Features</h3>
                    <p>Discover all the tools we offer to help you succeed</p>
                </div>
                <div class="feature-item">
                    <h3>👥 Connect</h3>
                    <p>Join our community of like-minded individuals</p>
                </div>
                <div class="feature-item">
                    <h3>📚 Learn</h3>
                    <p>Access our resources and tutorials</p>
                </div>
                <div class="feature-item">
                    <h3>💼 Grow</h3>
                    <p>Take your skills to the next level</p>
                </div>
            </div>

            <!-- Special Offer Section -->
            @if($offerDetails)
                <div class="offer-section">
                    <h3>Special Welcome Offer! 🎁</h3>
                    <p>{{ $offerDetails }}</p>
                    <p><strong>Limited time only!</strong></p>
                </div>
            @endif

            <!-- Call to Action -->
            <div style="text-align: center;">
                <a href="{{ url('/dashboard') }}" class="cta-button">
                    Get Started Now
                </a>
            </div>

            <!-- Additional Info -->
            <div style="margin-top: 30px; padding: 20px; background: #e8f4fd; border-radius: 8px;">
                <h3 style="color: #2980b9; margin-bottom: 15px;">Need Help?</h3>
                <p>Our support team is here to help you get started. Don't hesitate to reach out!</p>
                <p>Email: support@example.com</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <div class="social-links">
                <a href="#">Facebook</a> •
                <a href="#">Twitter</a> •
                <a href="#">LinkedIn</a> •
                <a href="#">Instagram</a>
            </div>
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
            <p style="font-size: 12px; margin-top: 10px;">
                You're receiving this email because you signed up for our service.<br>
                <a href="#" style="color: #ecf0f1;">Unsubscribe</a> |
                <a href="#" style="color: #ecf0f1;">View in Browser</a>
            </p>
        </div>
    </div>
</body>

</html>