<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>صفحة الدفع باستخدام Stripe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f7f7f7;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        }
        #card-element {
            border: 1px solid #ccc;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        #submit {
            background-color: #6772e5;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
        }
        #submit:disabled {
            background-color: #bbb;
            cursor: not-allowed;
        }
        #payment-message {
            margin-top: 20px;
            font-weight: bold;
            color: green;
        }
        #payment-error {
            margin-top: 20px;
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>ادفع باستخدام بطاقة الائتمان</h2>

    <!-- عنصر Stripe لادخال بيانات البطاقة -->
    <div id="card-element"></div>

    <button id="submit">ادفع الآن</button>

    <div id="payment-message"></div>
    <div id="payment-error"></div>
</div>

<!-- استدعاء مكتبة Stripe -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    // ضع هنا مفتاحك العام من Stripe
    const stripe = Stripe("pk_test_XXXXXXXXXXXXXXXXXXXXXXXX");

    const elements = stripe.elements();
    const card = elements.create("card");
    card.mount("#card-element");

    const submitButton = document.getElementById("submit");
    const paymentMessage = document.getElementById("payment-message");
    const paymentError = document.getElementById("payment-error");

    submitButton.addEventListener("click", async () => {
        submitButton.disabled = true;
        paymentMessage.textContent = "";
        paymentError.textContent = "";
        paymentMessage.textContent = "جاري معالجة الدفع...";

        try {
            // استدعاء السيرفر للحصول على client_secret
            const response = await fetch("/create-payment-intent", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}" // لو تستخدم Blade (تأكد من تمرير التوكن في القالب)
                },
                body: JSON.stringify({}) // ترسل بيانات اذا احتجت
            });

            const data = await response.json();

            if(!response.ok) {
                throw new Error(data.message || "خطأ في الاتصال بالسيرفر");
            }

            const clientSecret = data.client_secret;

            // تأكيد الدفع عبر Stripe باستخدام client_secret وبيانات البطاقة
            const {error, paymentIntent} = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card,
                }
            });

            if (error) {
                paymentError.textContent = "حدث خطأ: " + error.message;
                submitButton.disabled = false;
                paymentMessage.textContent = "";
            } else if (paymentIntent.status === 'succeeded') {
                paymentMessage.textContent = "تم الدفع بنجاح! شكرًا لك.";
            }
        } catch (err) {
            paymentError.textContent = "حدث خطأ: " + err.message;
            paymentMessage.textContent = "";
            submitButton.disabled = false;
        }
    });
</script>
</body>
</html>
