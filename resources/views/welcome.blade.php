<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدرسة تحفيظ القرآن الكريم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        :root {
            --islamic-green: #1B4D3E;
            --light-green: #2E7D32;
            --accent-gold: #D4AF37;
            --cream: #F8F6F2;
            --orange: #E9A06F;
        }
        
        body {
            font-family: 'Amiri', serif;
            background-color: var(--cream);
            color: var(--islamic-green);
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .nav-link, .navbar-brand {
            color: var(--islamic-green) !important;
            font-weight: bold;
        }

        .nav-link.active, .nav-link:hover {
            color: var(--orange) !important;
        }

        .hero-section {
            background: white;
            padding: 60px 0 40px 0;
        }

        .hero-img-arch {
            width: 100%;
            max-width: 350px;
            aspect-ratio: 1/1.2;
            border-radius: 0 0 180px 180px/0 0 200px 200px;
            overflow: hidden;
            margin: 0 auto 20px auto;
            box-shadow: 0 8px 32px rgba(27,77,62,0.10);
            background: var(--cream);
        }

        .hero-img-arch img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--islamic-green);
        }

        .hero-desc {
            font-size: 1.2rem;
            color: #444;
            margin-bottom: 30px;
        }

        .btn-main {
            background: var(--islamic-green);
            color: #fff;
            border-radius: 30px;
            padding: 12px 32px;
            font-size: 1.1rem;
            border: none;
            margin-left: 10px;
            transition: background 0.2s;
        }

        .btn-main:hover {
            background: var(--light-green);
        }

        .btn-secondary {
            background: var(--orange);
            color: #fff;
            border-radius: 30px;
            padding: 12px 32px;
            font-size: 1.1rem;
            border: none;
            transition: background 0.2s;
        }

        .btn-secondary:hover {
            background: #d98c4a;
        }

        .prayer-times {
            background: var(--islamic-green);
            color: #fff;
            border-radius: 20px;
            padding: 24px 16px;
            margin: 40px 0 0 0;
            box-shadow: 0 4px 16px rgba(27,77,62,0.08);
        }

        .prayer-times .pt-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .prayer-times .pt-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }

        .prayer-times .pt-card {
            background: var(--light-green);
            border-radius: 12px;
            padding: 10px 18px;
            flex: 1 1 120px;
            margin: 4px 0;
            text-align: center;
        }

        .pt-card .pt-name {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .pt-card .pt-time {
            font-size: 1rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: bold;
            color: var(--islamic-green);
            margin-bottom: 32px;
        }

        .card-img-arch {
            width: 100%;
            aspect-ratio: 1.2/1;
            border-radius: 0 0 80px 80px/0 0 100px 100px;
            overflow: hidden;
            margin-bottom: 12px;
            background: var(--cream);
        }

        .card-img-arch img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .event-card, .campaign-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(27,77,62,0.07);
            padding: 18px 18px 10px 18px;
            margin-bottom: 24px;
            height: 100%;
        }

        .event-card .event-title, .campaign-card .campaign-title {
            font-size: 1.1rem;
            font-weight: bold;
            color: var(--islamic-green);
        }

        .event-card .event-desc, .campaign-card .campaign-desc {
            font-size: 1rem;
            color: #444;
        }

        .footer {
            background: var(--islamic-green);
            color: #fff;
            padding: 32px 0 12px 0;
            text-align: center;
            border-radius: 30px 30px 0 0;
            margin-top: 60px;
        }

        .footer a {
            color: var(--accent-gold);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">مدرسة التحفيظ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">عن المدرسة</a></li>
                    <li class="nav-item"><a class="nav-link" href="#events">الفعاليات</a></li>
                    <li class="nav-item"><a class="nav-link" href="#campaigns">الحملات</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">تواصل</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                    <div class="hero-img-arch">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="مسجد" />
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="hero-title mb-3">مدرسة تحفيظ القرآن الكريم</div>
                    <div class="hero-desc mb-4">نعتمد على دعمكم المستمر لنواصل رسالتنا في تعليم القرآن الكريم وتربية الأجيال على الأخلاق الحميدة.</div>
                    <a href="#contact" class="btn btn-main">تواصل معنا</a>
                    <a href="#" class="btn btn-secondary">شاهد الفيديو</a>
                </div>
            </div>
            <!-- Prayer Times -->
            <div class="prayer-times mt-5 mx-auto" style="max-width: 700px;">
                <div class="pt-title mb-3">مواقيت الصلاة اليوم</div>
                <div class="pt-row">
                    <div class="pt-card">
                        <div class="pt-name">الفجر</div>
                        <div class="pt-time">4:15 ص</div>
                    </div>
                    <div class="pt-card">
                        <div class="pt-name">الظهر</div>
                        <div class="pt-time">12:30 م</div>
                    </div>
                    <div class="pt-card">
                        <div class="pt-name">العصر</div>
                        <div class="pt-time">3:45 م</div>
                    </div>
                    <div class="pt-card">
                        <div class="pt-name">المغرب</div>
                        <div class="pt-time">6:20 م</div>
                    </div>
                    <div class="pt-card">
                        <div class="pt-name">العشاء</div>
                        <div class="pt-time">7:45 م</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="section-title text-center mb-5">عن المدرسة</div>
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="card-img-arch">
                        <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=600&q=80" alt="طلاب" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="font-size:1.1rem; color:#444;">مدرستنا تهدف إلى تحفيظ القرآن الكريم وتعليم التجويد، مع التركيز على بناء جيل ملتزم بالقيم الإسلامية والأخلاق الحميدة من خلال برامج تعليمية وأنشطة متنوعة.</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Events Section -->
    <section id="events" class="py-5" style="background: #fff;">
        <div class="container">
            <div class="section-title text-center mb-5">الفعاليات القادمة</div>
            <div class="row">
                <div class="col-md-4">
                    <div class="event-card">
                        <div class="card-img-arch">
                            <img src="https://images.unsplash.com/photo-1503676382389-4809596d5290?auto=format&fit=crop&w=400&q=80" alt="فعالية 1" />
                        </div>
                        <div class="event-title mb-2">مسابقة حفظ القرآن</div>
                        <div class="event-desc mb-2">انضم إلى مسابقتنا السنوية لحفظ القرآن الكريم لجميع الأعمار.</div>
                        <div style="color:var(--orange); font-size:0.95rem;">15 رمضان 1445 هـ</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="event-card">
                        <div class="card-img-arch">
                            <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" alt="فعالية 2" />
                        </div>
                        <div class="event-title mb-2">رحلة للمسجد النبوي</div>
                        <div class="event-desc mb-2">رحلة تعليمية وزيارة لأحد أقدس المساجد في العالم الإسلامي.</div>
                        <div style="color:var(--orange); font-size:0.95rem;">22 رمضان 1445 هـ</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="event-card">
                        <div class="card-img-arch">
                            <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80" alt="فعالية 3" />
                        </div>
                        <div class="event-title mb-2">دورة التجويد المكثفة</div>
                        <div class="event-desc mb-2">تعلم أحكام التجويد مع نخبة من المعلمين المتخصصين.</div>
                        <div style="color:var(--orange); font-size:0.95rem;">1 شوال 1445 هـ</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Campaigns Section -->
    <section id="campaigns" class="py-5">
        <div class="container">
            <div class="section-title text-center mb-5">حملات الدعم</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="campaign-card">
                        <div class="card-img-arch">
                            <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=400&q=80" alt="حملة 1" />
                        </div>
                        <div class="campaign-title mb-2">دعم الطلاب المحتاجين</div>
                        <div class="campaign-desc mb-2">ساهم في توفير المصاحف واللوازم الدراسية للطلاب غير القادرين.</div>
                        <a href="#" class="btn btn-main w-100">تبرع الآن</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="campaign-card">
                        <div class="card-img-arch">
                            <img src="https://images.unsplash.com/photo-1468421870903-4df1664ac249?auto=format&fit=crop&w=400&q=80" alt="حملة 2" />
                        </div>
                        <div class="campaign-title mb-2">تجديد مرافق المدرسة</div>
                        <div class="campaign-desc mb-2">شارك في تطوير وتجديد مرافق المدرسة لخدمة الطلاب بشكل أفضل.</div>
                        <a href="#" class="btn btn-secondary w-100">شارك الآن</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact" class="py-5" style="background: #fff;">
        <div class="container">
            <div class="section-title text-center mb-5">تواصل معنا</div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="الاسم الكامل">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="البريد الإلكتروني">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="5" placeholder="رسالتك"></textarea>
                        </div>
                        <button type="submit" class="btn btn-main w-100">إرسال</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer">
        <div>جميع الحقوق محفوظة &copy; 2024 | <a href="#">مدرسة تحفيظ القرآن الكريم</a></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
