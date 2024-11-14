<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Ketua Umum HMTI</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/placeholder.svg?height=400&width=1200');
            background-size: cover;
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        .header-text {
            max-width: 800px;
            margin: 1rem auto;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
        }

        .section-title {
            text-align: center;
            margin: 1rem 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .candidates {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            margin: 1rem 0;
        }

        @media (min-width: 768px) {
            .candidates {
                grid-template-columns: 1fr 1fr;
            }
        }

        .candidate-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .candidate-header {
            background: #2c5282;
            color: white;
            padding: 0.5rem;
            text-align: center;
        }

        .candidate-content {
            text-align: center;
            padding: 1rem;
        }

        .candidate-image {
            width: 200px;
            height: 280px;
            object-fit: cover;
            border-radius: 5px;
            margin: 1rem auto;
            display: block;
        }

        .vision-mission {
            margin: 1rem auto;
            text-align: center;
        }

        .vision-mission h3 {
            color: #2c5282;
            margin: 1rem 0;
        }

        .vision-mission ol {
            list-style-position: outside;
            margin: 0 1rem;
            text-align: justify;
        }

        .voting-section {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .voting-options {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .vote-card {
            background: white;
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            position: relative;
            width: 250px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .vote-card img {
            width: 180px;
            height: 250px;
            object-fit: cover;
            border-radius: 5px;
            margin: 1rem auto;
            display: block;
        }

        .vote-card h3 {
            margin-top: 0.5rem;
        }

        .vote-card.selected {
            outline: 3px solid #2c5282;
        }

        .vote-check {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 20px;
            height: 20px;
            border: 2px solid #2c5282;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: white;
            display: none;
        }

        .vote-card.selected .vote-check {
            display: flex;
            background: #2c5282;
            content: "✓";
        }

        .video-card {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            margin: 2rem 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .video-wrapper {
            width: 85%;
            margin: 0 auto;
            /* Centers the video */
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-top: 56.25%;
            /* 16:9 aspect ratio */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .vote-button {
            background: #4299e1;
            color: white;
            border: none;
            padding: 1rem 3rem;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 1.5rem;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .vote-button:hover {
            background: #2c5282;
        }
    </style>
</head>

<body>
    <header class="header">
        <img src="/placeholder.svg?height=80&width=80" alt="Logo HMTI" class="logo">
        <h1>PEMILIHAN KETUA UMUM</h1>
        <h2>Himpunan Mahasiswa Teknologi Informasi</h2>
        <p class="header-text">
            Pemilihan Ketua Umum (Pilketum) Himpunan Mahasiswa Teknologi Informasi merupakan ajang demokrasi mahasiswa
            untuk memilih ketua umum baru yang akan memimpin selama satu periode. Pilketum menjadi sarana regenerasi
            kepemimpinan di HMTI demi kemajuan himpunan, pengembangan anggota, serta terciptanya lingkungan organisasi
            yang lebih dinamis dan progresif.
        </p>
    </header>

    <div class="container">
        <h2 class="section-title">CALON KETUA UMUM</h2>

        <div class="candidates">

            @foreach ($paslons as $paslon)
                <div class="candidate-card">
                    <div class="candidate-header">
                        <h3>KANDIDAT {{ $paslon->no_urut }}</h3>
                    </div>
                    <div class="candidate-content">
                        <img src="{{ asset('storage/' . $paslon->foto) }}" alt="Foto {{ $paslon->nama }}"
                            class="candidate-image">
                        <h3>{{ $paslon->nama }}</h3>
                        <p>{{ $paslon->prodi }}</p>

                        <div class="vision-mission">
                            <h3>VISI</h3>
                            <p>{{ $paslon->visi }}</p>

                            <h3>MISI</h3>
                            <ol>
                                @foreach ($paslon->misis as $misi)
                                    <li>{{ $misi->misi }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="video-section video-card">
            <h2 class="section-title">VIDEO ORASI EKSTERNAL CALON KANDIDAT KETUA UMUM</h2>
            <div class="video-wrapper">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/uthPvsqYkVE" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="voting-section">
            <h2 class="section-title">PILIH CALON KETUA UMUM</h2>

            <form id="vote_form" action="{{ route('vote') }}" method="POST" onsubmit="return submitVote()">
                @csrf
                <div class="voting-options">
                    @foreach ($paslons as $paslon)
                        <div class="vote-card" onclick="selectCandidate('{{ $paslon->no_urut }}')">
                            <img src="{{ asset('storage/' . $paslon->foto) }}" alt="{{ $paslon->nama }}"
                                class="candidate-image">
                            <h3>{{ $paslon->nama }}</h3>
                            <div class="vote-check"></div>
                        </div>
                    @endforeach
                </div>
                <input type="hidden" id="no_urut" name="no_urut">
                <button type="submit" class="vote-button">Vote</button>
            </form>
        </div>
    </div>

    <script>
        let selectedCandidate = null;

        function selectCandidate(candidateNum) {
            const cards = document.querySelectorAll('.vote-card');
            cards.forEach(card => card.classList.remove('selected'));
            const checks = document.querySelectorAll('.vote-check');
            checks.forEach(check => check.style.display = 'none');

            const selectedCard = document.querySelector(`.vote-card:nth-child(${candidateNum})`);
            const selectedCheck = selectedCard.querySelector('.vote-check');
            selectedCard.classList.add('selected');
            selectedCheck.style.display = 'flex';
            selectedCandidate = candidateNum;
            document.getElementById('no_urut').value = candidateNum;
        }

        function submitVote() {
            if (!selectedCandidate) {
                alert('Harap pilih salah satu kandidat.');
                return false;
            }

            if (confirm(`Apakah Anda yakin ingin memilih kandidat ${selectedCandidate}?`)) {
                alert(`Suara Anda untuk kandidat ${selectedCandidate} telah diterima!`);
                return true;

            } else {
                alert("Pemilihan dibatalkan. Silakan pilih kembali jika Anda berubah pikiran.");
                return false;
            }
        }
    </script>
</body>

</html>
