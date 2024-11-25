<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Lets Chat</title>
    <link rel="stylesheet" href="../Chat-Application/css/contact.css">

</head>

<body>
    <nav>
        <div class="logo">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="#8a2be2">
                <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
            </svg>
            Lets Chat
        </div>
        <div class="nav-links">
            <a href="../Chat-Application/index.php">Home</a>
            <a href="#about">About</a>
            <a href="../Chat-Application/contact.php">Contact Us</a>
        </div>
        <div class="nav-buttons">
            <button class="button button-outline"><a href="../Chat-Application/signup.php">Sign up</a></button>
            <button class="button button-primary"><a href="../Chat-Application/login.php">Login</a></button>
        </div>
    </nav>

    <section class="contact-header">
        <h1>Get in <span>Touch</span></h1>
        <p>We're here to help and answer any question you might have.</p>
    </section>

    <section class="contact-info">
        <div class="contact-card">
            <div class="icon-circle">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="#8a2be2">
                    <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                </svg>
            </div>
            <h3>Email Us</h3>
            <p>contact@letschat.com</p>
            <p>support@letschat.com</p>
        </div>
        <div class="contact-card">
            <div class="icon-circle">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="#8a2be2">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                </svg>
            </div>
            <h3>Visit Us</h3>
            <p>Upper Bonduma</p>
            <p>Buea, Cameroon</p>
        </div>
        <div class="contact-card">
            <div class="icon-circle">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="#8a2be2">
                    <path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57-.35-.11-.74-.03-1.02.24l-2.2 2.2c-2.83-1.44-5.15-3.75-6.59-6.59l2.2-2.21c.28-.26.36-.65.25-1C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1zM19 12h2c0-4.97-4.03-9-9-9v2c3.87 0 7 3.13 7 7z" />
                </svg>
            </div>
            <h3>Call Us</h3>
            <p>+237 654471251</p>
            <p>Mon - Fri, 9am - 6pm</p>
        </div>
    </section>

    <section class="contact-form-section">
        <div class="contact-form">
            <h2>Send us a Message</h2>
            <p>Fill out the form below and we'll get back to you as soon as possible.</p>
            <form id="contactForm">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required placeholder="John Doe">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="john@example.com">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required placeholder="How can we help?">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required placeholder="Your message here..."></textarea>
                </div>
                <button type="submit" class="button button-primary">Send Message</button>
            </form>
        </div>
    </section>

    <footer>
        <div>© Letschat Ltd 2024</div>
        <div class="social-links">
            <a href="#" aria-label="LinkedIn"><svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                    <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z" />
                </svg></a>
            <a href="#" aria-label="Facebook"><svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                </svg></a>
            <a href="#" aria-label="Instagram"><svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                    <path d="M16 2H8C4.69 2 2 4.69 2 8v8c0 3.31 2.69 6 6 6h8c3.31 0 6-2.69 6-6V8c0-3.31-2.69-6-6-6zm-2 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z" />
                </svg></a>
            <a href="#" aria-label="Twitter"><svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0 0 23 3z" />
                </svg></a>
        </div>
    </footer>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            alert('Thank you for your message! We will get back to you soon.');
        });
    </script>
</body>

</html>