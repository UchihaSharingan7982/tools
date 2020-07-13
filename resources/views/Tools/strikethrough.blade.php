@extends('layouts.app')

@section('title')
    STRIKETHROUGH
@endsection

@section('content')
        <div class="card card-custom card-stretch" id="kt_page_stretched_card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">STRIKETHROUGH <small>CROSS OUT TEXTS FOR ANY PLATFORM</small></h3>
                </div>
            </div>
            <!--begin::Form-->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label>Input your text here:</label>
                        <input type="email" class="form-control" placeholder="Enter Text Here"/>
                        <span class="form-text text-muted" style="padding-bottom: 20px;">This Text Will Be Cross Out</span>
                        <button type="reset" class="btn btn-primary mr-2" style="margin-bottom: 20px;" >StrikeEm</button>
                        <input type="email" class="form-control" disabled="disabled" placeholder="Your Cross Out Text Will Display Here"/>
                    </div>
                </div>
                <div class="card-body">
                <span class="font-size-h1 d-block d-block font-weight-boldest text-dark-75 py-2">About CMLABS Strikethrough Tool</span>
                    <p class="mb-15 d-flex flex-column">
                        <span>Jika Anda ingin menambahkan efek dicoret ke tweet atau pesan facebook Anda, maka alat online ini yang Anda butuhkan. Cukup tambahkan teks di area yang tersedia di tool striketrough text generator, lalu klik pada tombol StrikeEm.</span><br>
                        <span>Strikethrough (aka strikeout) is the appearance of words with horizontal lines through its center. This implies that the text was wrong and was recently deleted or marked as such.</span><br>
                        <span>Unlike HTML tags, this crossed out text will function when you copy it to another location. That's because the crossed out characters generated by this tool are in plain text, which can be posted on Facebook, Twitter, Google+ etc.</span>
                    </p>
                </div>
                <div class="card-body">
                    <span class="font-size-h1 d-block d-block font-weight-boldest text-dark-75 py-2">The Use of Strikethrough Text</span>
                    <p class="mb-15 d-flex flex-column">
                        <span>For copywriters, striketrough text is often useful for crossing out the prices or features contained in the advertised product or service. This text crossing serves to explain to the customer about the discounted initial price or the additional features that can be obtained by adding a number of payments, and others.</span><br>
                        <span>For content writers, striketrough text is useful for showing the right way to write or spell by giving the wrong comparison (crossed out text) side by side with the correct way of writing or spelling. So, the reader can see the difference clearly.</span><br>
                        <span>Not only for copywriters and content writers, many fields require strikethrough texts for various needs. This tool can also cross out not only letters, but also numbers and other characters.</span>
                    </p>
                </div>
                <div class="card-body">
                    <span class="font-size-h1 d-block d-block font-weight-boldest text-dark-75 py-2">Bagaimana cara menggunakan striketrough text generator?</span>
                    <p class="mb-15 d-flex flex-column">
                        <span>Follow these simple steps to cross out text on any web page or social networking site like Facebook, Twitter, Instagram.</span>
                        <ul>
                        <li>Input your text</li>
                        <li>Click the StrikeEm button</li>
                        <li>Klik s̶t̶r̶i̶k̶e̶t̶hr̶o̶u̶g̶h̶ ̶t̶e̶x̶t̶ yang dihasilkan.</li>
                        <li>It will be automatically copied</li>
                        <li>Paste it anywhere you want.</li>
                    </ul>
                    </p>
                </div>
            </form>
            <!--end::Form-->
        </div>
@endsection
