<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SistemInformasiMagang API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.11.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.11.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-mahasiswa">
                                <a href="#endpoints-GETapi-mahasiswa">GET api/mahasiswa</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-mahasiswa-store">
                                <a href="#endpoints-POSTapi-mahasiswa-store">POST api/mahasiswa/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mahasiswa--nim-">
                                <a href="#endpoints-GETapi-mahasiswa--nim-">GET api/mahasiswa/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-mahasiswa-update--nim-">
                                <a href="#endpoints-PUTapi-mahasiswa-update--nim-">PUT api/mahasiswa/update/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-mahasiswa-delete--nim-">
                                <a href="#endpoints-DELETEapi-mahasiswa-delete--nim-">DELETE api/mahasiswa/delete/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dosen">
                                <a href="#endpoints-GETapi-dosen">GET api/dosen</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dosen-store">
                                <a href="#endpoints-POSTapi-dosen-store">POST api/dosen/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dosen--nidn-">
                                <a href="#endpoints-GETapi-dosen--nidn-">GET api/dosen/{nidn}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-dosen-update--nidn-">
                                <a href="#endpoints-PUTapi-dosen-update--nidn-">PUT api/dosen/update/{nidn}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-dosen-delete--nidn-">
                                <a href="#endpoints-DELETEapi-dosen-delete--nidn-">DELETE api/dosen/delete/{nidn}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mitra">
                                <a href="#endpoints-GETapi-mitra">GET api/mitra</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-mitra-store">
                                <a href="#endpoints-POSTapi-mitra-store">POST api/mitra/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mitra--id_mitra-">
                                <a href="#endpoints-GETapi-mitra--id_mitra-">GET api/mitra/{id_mitra}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-mitra-update--id_mitra-">
                                <a href="#endpoints-PUTapi-mitra-update--id_mitra-">PUT api/mitra/update/{id_mitra}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-mitra-delete--id_mitra-">
                                <a href="#endpoints-DELETEapi-mitra-delete--id_mitra-">DELETE api/mitra/delete/{id_mitra}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-programmagang">
                                <a href="#endpoints-GETapi-programmagang">GET api/programmagang</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-programmagang-store">
                                <a href="#endpoints-POSTapi-programmagang-store">POST api/programmagang/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-programmagang--id_program-">
                                <a href="#endpoints-GETapi-programmagang--id_program-">GET api/programmagang/{id_program}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-programmagang-update--id_program-">
                                <a href="#endpoints-PUTapi-programmagang-update--id_program-">PUT api/programmagang/update/{id_program}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-programmagang-delete--id_program-">
                                <a href="#endpoints-DELETEapi-programmagang-delete--id_program-">DELETE api/programmagang/delete/{id_program}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-pendaftaran-store">
                                <a href="#endpoints-POSTapi-pendaftaran-store">POST api/pendaftaran/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-pembimbing">
                                <a href="#endpoints-GETapi-pembimbing">GET api/pembimbing</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-pembimbing-store">
                                <a href="#endpoints-POSTapi-pembimbing-store">POST api/pembimbing/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-pembimbing--nidn-">
                                <a href="#endpoints-GETapi-pembimbing--nidn-">GET api/pembimbing/{nidn}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-pembimbing-update--nidn-">
                                <a href="#endpoints-PUTapi-pembimbing-update--nidn-">PUT api/pembimbing/update/{nidn}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-pembimbing-delete--nidn-">
                                <a href="#endpoints-DELETEapi-pembimbing-delete--nidn-">DELETE api/pembimbing/delete/{nidn}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-logbook">
                                <a href="#endpoints-GETapi-logbook">GET api/logbook</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-logbook-store">
                                <a href="#endpoints-POSTapi-logbook-store">POST api/logbook/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-logbook--nim-">
                                <a href="#endpoints-GETapi-logbook--nim-">GET api/logbook/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-logbook-update--nim-">
                                <a href="#endpoints-PUTapi-logbook-update--nim-">PUT api/logbook/update/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-logbook-delete--nim-">
                                <a href="#endpoints-DELETEapi-logbook-delete--nim-">DELETE api/logbook/delete/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-laporan">
                                <a href="#endpoints-GETapi-laporan">GET api/laporan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-laporan-store">
                                <a href="#endpoints-POSTapi-laporan-store">POST api/laporan/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-laporan--id_laporan-">
                                <a href="#endpoints-GETapi-laporan--id_laporan-">GET api/laporan/{id_laporan}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-laporan-update--id_laporan-">
                                <a href="#endpoints-PUTapi-laporan-update--id_laporan-">PUT api/laporan/update/{id_laporan}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-laporan-delete--id_laporan-">
                                <a href="#endpoints-DELETEapi-laporan-delete--id_laporan-">DELETE api/laporan/delete/{id_laporan}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-penilaian">
                                <a href="#endpoints-GETapi-penilaian">GET api/penilaian</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-penilaian-store">
                                <a href="#endpoints-POSTapi-penilaian-store">POST api/penilaian/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-penilaian--nim-">
                                <a href="#endpoints-GETapi-penilaian--nim-">GET api/penilaian/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-penilaian-update--nim-">
                                <a href="#endpoints-PUTapi-penilaian-update--nim-">PUT api/penilaian/update/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-penilaian-delete--nim-">
                                <a href="#endpoints-DELETEapi-penilaian-delete--nim-">DELETE api/penilaian/delete/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-matakuliah">
                                <a href="#endpoints-GETapi-matakuliah">GET api/matakuliah</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-matakuliah-store">
                                <a href="#endpoints-POSTapi-matakuliah-store">POST api/matakuliah/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-matakuliah--id_matkul-">
                                <a href="#endpoints-GETapi-matakuliah--id_matkul-">GET api/matakuliah/{id_matkul}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-matakuliah-update--id_matkul-">
                                <a href="#endpoints-PUTapi-matakuliah-update--id_matkul-">PUT api/matakuliah/update/{id_matkul}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-matakuliah-delete--id_matkul-">
                                <a href="#endpoints-DELETEapi-matakuliah-delete--id_matkul-">DELETE api/matakuliah/delete/{id_matkul}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-transkripmagang">
                                <a href="#endpoints-GETapi-transkripmagang">GET api/transkripmagang</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-transkripmagang-store">
                                <a href="#endpoints-POSTapi-transkripmagang-store">POST api/transkripmagang/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-transkripmagang--id_transkrip-">
                                <a href="#endpoints-GETapi-transkripmagang--id_transkrip-">GET api/transkripmagang/{id_transkrip}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-transkripmagang-update--id_transkrip-">
                                <a href="#endpoints-PUTapi-transkripmagang-update--id_transkrip-">PUT api/transkripmagang/update/{id_transkrip}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-transkripmagang-delete--id_transkrip-">
                                <a href="#endpoints-DELETEapi-transkripmagang-delete--id_transkrip-">DELETE api/transkripmagang/delete/{id_transkrip}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-usulankonversi">
                                <a href="#endpoints-GETapi-usulankonversi">GET api/usulankonversi</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-usulankonversi-store">
                                <a href="#endpoints-POSTapi-usulankonversi-store">POST api/usulankonversi/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-usulankonversi--nim-">
                                <a href="#endpoints-GETapi-usulankonversi--nim-">GET api/usulankonversi/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-usulankonversi-update--nim-">
                                <a href="#endpoints-PUTapi-usulankonversi-update--nim-">PUT api/usulankonversi/update/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-usulankonversi-delete--nim-">
                                <a href="#endpoints-DELETEapi-usulankonversi-delete--nim-">DELETE api/usulankonversi/delete/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 30, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-mahasiswa">GET api/mahasiswa</h2>

<p>
</p>



<span id="example-requests-GETapi-mahasiswa">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mahasiswa" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mahasiswa"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mahasiswa">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;user_id&quot;: 1,
        &quot;nim&quot;: &quot;22500046&quot;,
        &quot;prodi&quot;: &quot;informatika&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: &quot;mahasiswa/22500046_1767683860.jpeg&quot;,
        &quot;created_at&quot;: &quot;2025-12-30T14:22:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-06T07:17:40.000000Z&quot;
    },
    {
        &quot;id&quot;: 2,
        &quot;user_id&quot;: 4,
        &quot;nim&quot;: &quot;22500001&quot;,
        &quot;prodi&quot;: &quot;sistem_informasi&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: &quot;mahasiswa/22500001_1767763517.jpeg&quot;,
        &quot;created_at&quot;: &quot;2026-01-05T17:04:15.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-07T05:25:18.000000Z&quot;
    },
    {
        &quot;id&quot;: 3,
        &quot;user_id&quot;: 5,
        &quot;nim&quot;: &quot;22500073&quot;,
        &quot;prodi&quot;: &quot;informatika&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: null,
        &quot;created_at&quot;: &quot;2026-01-09T07:08:57.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-09T07:08:57.000000Z&quot;
    },
    {
        &quot;id&quot;: 4,
        &quot;user_id&quot;: 9,
        &quot;nim&quot;: &quot;22530022&quot;,
        &quot;prodi&quot;: &quot;sistem_informasi&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: null,
        &quot;created_at&quot;: &quot;2026-01-15T02:17:17.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-15T02:17:17.000000Z&quot;
    },
    {
        &quot;id&quot;: 5,
        &quot;user_id&quot;: 10,
        &quot;nim&quot;: &quot;33131122&quot;,
        &quot;prodi&quot;: &quot;informatika&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: &quot;disetujui&quot;,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: &quot;mahasiswa/33131122_1776057703.jpg&quot;,
        &quot;created_at&quot;: &quot;2026-02-04T04:40:34.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-13T05:21:43.000000Z&quot;
    },
    {
        &quot;id&quot;: 6,
        &quot;user_id&quot;: 11,
        &quot;nim&quot;: &quot;22530012&quot;,
        &quot;prodi&quot;: &quot;teknik_komputer&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: null,
        &quot;created_at&quot;: &quot;2026-02-23T04:11:29.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-02-23T04:11:29.000000Z&quot;
    },
    {
        &quot;id&quot;: 7,
        &quot;user_id&quot;: 12,
        &quot;nim&quot;: &quot;22500051&quot;,
        &quot;prodi&quot;: &quot;informatika&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: &quot;diisi&quot;,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: null,
        &quot;created_at&quot;: &quot;2026-03-30T03:59:32.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-03-30T04:15:14.000000Z&quot;
    },
    {
        &quot;id&quot;: 8,
        &quot;user_id&quot;: 13,
        &quot;nim&quot;: &quot;22530017&quot;,
        &quot;prodi&quot;: &quot;teknik_komputer&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: null,
        &quot;created_at&quot;: &quot;2026-04-13T04:29:47.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-13T04:29:47.000000Z&quot;
    },
    {
        &quot;id&quot;: 9,
        &quot;user_id&quot;: 14,
        &quot;nim&quot;: &quot;22530089&quot;,
        &quot;prodi&quot;: &quot;sistem_informasi&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: null,
        &quot;created_at&quot;: &quot;2026-04-13T04:42:43.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-13T04:42:43.000000Z&quot;
    },
    {
        &quot;id&quot;: 10,
        &quot;user_id&quot;: 15,
        &quot;nim&quot;: &quot;22500077&quot;,
        &quot;prodi&quot;: &quot;sistem_informasi&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: null,
        &quot;created_at&quot;: &quot;2026-04-13T05:26:24.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-13T05:26:24.000000Z&quot;
    },
    {
        &quot;id&quot;: 11,
        &quot;user_id&quot;: 16,
        &quot;nim&quot;: &quot;1123121&quot;,
        &quot;prodi&quot;: &quot;informatika&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: &quot;mahasiswa/1123121_1776060425.jpg&quot;,
        &quot;created_at&quot;: &quot;2026-04-13T05:33:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-13T06:07:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 12,
        &quot;user_id&quot;: 17,
        &quot;nim&quot;: &quot;22500099&quot;,
        &quot;prodi&quot;: &quot;teknik_komputer&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: null,
        &quot;created_at&quot;: &quot;2026-04-13T05:35:14.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-13T05:35:14.000000Z&quot;
    },
    {
        &quot;id&quot;: 13,
        &quot;user_id&quot;: 18,
        &quot;nim&quot;: &quot;22567000&quot;,
        &quot;prodi&quot;: &quot;sistem_informasi&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: null,
        &quot;created_at&quot;: &quot;2026-04-13T08:46:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-13T08:46:42.000000Z&quot;
    },
    {
        &quot;id&quot;: 14,
        &quot;user_id&quot;: 19,
        &quot;nim&quot;: &quot;1010101010&quot;,
        &quot;prodi&quot;: &quot;sistem_informasi&quot;,
        &quot;status&quot;: &quot;aktif&quot;,
        &quot;nomor_telepon&quot;: null,
        &quot;pengajuan_konversi&quot;: null,
        &quot;posisi&quot;: null,
        &quot;riwayat_magang&quot;: null,
        &quot;foto&quot;: null,
        &quot;created_at&quot;: &quot;2026-06-29T15:25:54.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-06-29T15:25:54.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mahasiswa" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mahasiswa"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mahasiswa"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mahasiswa" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mahasiswa">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mahasiswa" data-method="GET"
      data-path="api/mahasiswa"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mahasiswa', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mahasiswa"
                    onclick="tryItOut('GETapi-mahasiswa');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mahasiswa"
                    onclick="cancelTryOut('GETapi-mahasiswa');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mahasiswa"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mahasiswa</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mahasiswa"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mahasiswa"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-mahasiswa-store">POST api/mahasiswa/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-mahasiswa-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/mahasiswa/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mahasiswa/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-mahasiswa-store">
</span>
<span id="execution-results-POSTapi-mahasiswa-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-mahasiswa-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mahasiswa-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-mahasiswa-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mahasiswa-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-mahasiswa-store" data-method="POST"
      data-path="api/mahasiswa/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-mahasiswa-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-mahasiswa-store"
                    onclick="tryItOut('POSTapi-mahasiswa-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-mahasiswa-store"
                    onclick="cancelTryOut('POSTapi-mahasiswa-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-mahasiswa-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/mahasiswa/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-mahasiswa-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-mahasiswa-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-mahasiswa--nim-">GET api/mahasiswa/{nim}</h2>

<p>
</p>



<span id="example-requests-GETapi-mahasiswa--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mahasiswa/22500046" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mahasiswa/22500046"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mahasiswa--nim-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;user_id&quot;: 1,
    &quot;nim&quot;: &quot;22500046&quot;,
    &quot;prodi&quot;: &quot;informatika&quot;,
    &quot;status&quot;: &quot;aktif&quot;,
    &quot;nomor_telepon&quot;: null,
    &quot;pengajuan_konversi&quot;: null,
    &quot;posisi&quot;: null,
    &quot;riwayat_magang&quot;: null,
    &quot;foto&quot;: &quot;mahasiswa/22500046_1767683860.jpeg&quot;,
    &quot;created_at&quot;: &quot;2025-12-30T14:22:31.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2026-01-06T07:17:40.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mahasiswa--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mahasiswa--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mahasiswa--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mahasiswa--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mahasiswa--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mahasiswa--nim-" data-method="GET"
      data-path="api/mahasiswa/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mahasiswa--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mahasiswa--nim-"
                    onclick="tryItOut('GETapi-mahasiswa--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mahasiswa--nim-"
                    onclick="cancelTryOut('GETapi-mahasiswa--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mahasiswa--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mahasiswa/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mahasiswa--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mahasiswa--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="GETapi-mahasiswa--nim-"
               value="22500046"
               data-component="url">
    <br>
<p>Example: <code>22500046</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-mahasiswa-update--nim-">PUT api/mahasiswa/update/{nim}</h2>

<p>
</p>



<span id="example-requests-PUTapi-mahasiswa-update--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/mahasiswa/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mahasiswa/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-mahasiswa-update--nim-">
</span>
<span id="execution-results-PUTapi-mahasiswa-update--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-mahasiswa-update--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-mahasiswa-update--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-mahasiswa-update--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-mahasiswa-update--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-mahasiswa-update--nim-" data-method="PUT"
      data-path="api/mahasiswa/update/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-mahasiswa-update--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-mahasiswa-update--nim-"
                    onclick="tryItOut('PUTapi-mahasiswa-update--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-mahasiswa-update--nim-"
                    onclick="cancelTryOut('PUTapi-mahasiswa-update--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-mahasiswa-update--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/mahasiswa/update/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-mahasiswa-update--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-mahasiswa-update--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="PUTapi-mahasiswa-update--nim-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-mahasiswa-delete--nim-">DELETE api/mahasiswa/delete/{nim}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-mahasiswa-delete--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/mahasiswa/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mahasiswa/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-mahasiswa-delete--nim-">
</span>
<span id="execution-results-DELETEapi-mahasiswa-delete--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-mahasiswa-delete--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-mahasiswa-delete--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-mahasiswa-delete--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-mahasiswa-delete--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-mahasiswa-delete--nim-" data-method="DELETE"
      data-path="api/mahasiswa/delete/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-mahasiswa-delete--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-mahasiswa-delete--nim-"
                    onclick="tryItOut('DELETEapi-mahasiswa-delete--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-mahasiswa-delete--nim-"
                    onclick="cancelTryOut('DELETEapi-mahasiswa-delete--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-mahasiswa-delete--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/mahasiswa/delete/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-mahasiswa-delete--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-mahasiswa-delete--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="DELETEapi-mahasiswa-delete--nim-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-dosen">GET api/dosen</h2>

<p>
</p>



<span id="example-requests-GETapi-dosen">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/dosen" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/dosen"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dosen">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 57
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;nuptk&quot;: &quot;33131122&quot;,
        &quot;user_id&quot;: 7,
        &quot;kontak&quot;: &quot;0877005402501&quot;,
        &quot;foto_dosen&quot;: null,
        &quot;created_at&quot;: &quot;2026-01-14T09:26:09.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-02-23T04:25:11.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dosen" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dosen"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dosen"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dosen" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dosen">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dosen" data-method="GET"
      data-path="api/dosen"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dosen', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dosen"
                    onclick="tryItOut('GETapi-dosen');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dosen"
                    onclick="cancelTryOut('GETapi-dosen');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dosen"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dosen</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dosen"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dosen"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-dosen-store">POST api/dosen/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-dosen-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/dosen/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/dosen/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dosen-store">
</span>
<span id="execution-results-POSTapi-dosen-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dosen-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dosen-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dosen-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dosen-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dosen-store" data-method="POST"
      data-path="api/dosen/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dosen-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dosen-store"
                    onclick="tryItOut('POSTapi-dosen-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dosen-store"
                    onclick="cancelTryOut('POSTapi-dosen-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dosen-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dosen/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dosen-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dosen-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dosen--nidn-">GET api/dosen/{nidn}</h2>

<p>
</p>



<span id="example-requests-GETapi-dosen--nidn-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/dosen/33131122" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/dosen/33131122"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dosen--nidn-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 56
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;nuptk&quot;: &quot;33131122&quot;,
    &quot;user_id&quot;: 7,
    &quot;kontak&quot;: &quot;0877005402501&quot;,
    &quot;foto_dosen&quot;: null,
    &quot;created_at&quot;: &quot;2026-01-14T09:26:09.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2026-02-23T04:25:11.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dosen--nidn-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dosen--nidn-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dosen--nidn-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dosen--nidn-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dosen--nidn-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dosen--nidn-" data-method="GET"
      data-path="api/dosen/{nidn}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dosen--nidn-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dosen--nidn-"
                    onclick="tryItOut('GETapi-dosen--nidn-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dosen--nidn-"
                    onclick="cancelTryOut('GETapi-dosen--nidn-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dosen--nidn-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dosen/{nidn}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dosen--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dosen--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nidn</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nidn"                data-endpoint="GETapi-dosen--nidn-"
               value="33131122"
               data-component="url">
    <br>
<p>Example: <code>33131122</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-dosen-update--nidn-">PUT api/dosen/update/{nidn}</h2>

<p>
</p>



<span id="example-requests-PUTapi-dosen-update--nidn-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/dosen/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/dosen/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dosen-update--nidn-">
</span>
<span id="execution-results-PUTapi-dosen-update--nidn-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dosen-update--nidn-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dosen-update--nidn-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dosen-update--nidn-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dosen-update--nidn-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dosen-update--nidn-" data-method="PUT"
      data-path="api/dosen/update/{nidn}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dosen-update--nidn-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dosen-update--nidn-"
                    onclick="tryItOut('PUTapi-dosen-update--nidn-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dosen-update--nidn-"
                    onclick="cancelTryOut('PUTapi-dosen-update--nidn-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dosen-update--nidn-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dosen/update/{nidn}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-dosen-update--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-dosen-update--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nidn</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nidn"                data-endpoint="PUTapi-dosen-update--nidn-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-dosen-delete--nidn-">DELETE api/dosen/delete/{nidn}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-dosen-delete--nidn-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/dosen/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/dosen/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-dosen-delete--nidn-">
</span>
<span id="execution-results-DELETEapi-dosen-delete--nidn-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-dosen-delete--nidn-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-dosen-delete--nidn-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-dosen-delete--nidn-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-dosen-delete--nidn-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-dosen-delete--nidn-" data-method="DELETE"
      data-path="api/dosen/delete/{nidn}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-dosen-delete--nidn-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-dosen-delete--nidn-"
                    onclick="tryItOut('DELETEapi-dosen-delete--nidn-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-dosen-delete--nidn-"
                    onclick="cancelTryOut('DELETEapi-dosen-delete--nidn-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-dosen-delete--nidn-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/dosen/delete/{nidn}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-dosen-delete--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-dosen-delete--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nidn</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nidn"                data-endpoint="DELETEapi-dosen-delete--nidn-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-mitra">GET api/mitra</h2>

<p>
</p>



<span id="example-requests-GETapi-mitra">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mitra" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mitra"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mitra">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 55
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;nama_mitra&quot;: &quot;PT Teknologi Nusantara&quot;,
        &quot;alamat&quot;: &quot;Jl. Sudirman No. 45, Jakarta&quot;,
        &quot;kontak&quot;: &quot;021-5551234&quot;,
        &quot;gambar&quot;: &quot;mitra1.png&quot;,
        &quot;created_at&quot;: &quot;2026-01-02T12:48:30.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-02T12:48:30.000000Z&quot;
    },
    {
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;nama_mitra&quot;: &quot;CV Inovasi Digital&quot;,
        &quot;alamat&quot;: &quot;Jl. Ahmad Yani No. 10, Bandung&quot;,
        &quot;kontak&quot;: &quot;022-778899&quot;,
        &quot;gambar&quot;: &quot;mitra2.png&quot;,
        &quot;created_at&quot;: &quot;2026-01-02T12:48:30.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-02T12:48:30.000000Z&quot;
    },
    {
        &quot;id_mitra&quot;: &quot;MT003&quot;,
        &quot;nama_mitra&quot;: &quot;PT Solusi Data Indonesia&quot;,
        &quot;alamat&quot;: &quot;Jl. Gatot Subroto No. 88, Surabaya&quot;,
        &quot;kontak&quot;: &quot;031-667788&quot;,
        &quot;gambar&quot;: &quot;mitra3.png&quot;,
        &quot;created_at&quot;: &quot;2026-01-02T12:48:30.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-02T12:48:30.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mitra" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mitra"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mitra"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mitra" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mitra">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mitra" data-method="GET"
      data-path="api/mitra"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mitra', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mitra"
                    onclick="tryItOut('GETapi-mitra');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mitra"
                    onclick="cancelTryOut('GETapi-mitra');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mitra"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mitra</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mitra"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mitra"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-mitra-store">POST api/mitra/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-mitra-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/mitra/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mitra/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-mitra-store">
</span>
<span id="execution-results-POSTapi-mitra-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-mitra-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mitra-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-mitra-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mitra-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-mitra-store" data-method="POST"
      data-path="api/mitra/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-mitra-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-mitra-store"
                    onclick="tryItOut('POSTapi-mitra-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-mitra-store"
                    onclick="cancelTryOut('POSTapi-mitra-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-mitra-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/mitra/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-mitra-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-mitra-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-mitra--id_mitra-">GET api/mitra/{id_mitra}</h2>

<p>
</p>



<span id="example-requests-GETapi-mitra--id_mitra-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/mitra/MT001" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mitra/MT001"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mitra--id_mitra-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 54
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id_mitra&quot;: &quot;MT001&quot;,
    &quot;nama_mitra&quot;: &quot;PT Teknologi Nusantara&quot;,
    &quot;alamat&quot;: &quot;Jl. Sudirman No. 45, Jakarta&quot;,
    &quot;kontak&quot;: &quot;021-5551234&quot;,
    &quot;gambar&quot;: &quot;mitra1.png&quot;,
    &quot;created_at&quot;: &quot;2026-01-02T12:48:30.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2026-01-02T12:48:30.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mitra--id_mitra-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mitra--id_mitra-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mitra--id_mitra-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mitra--id_mitra-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mitra--id_mitra-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mitra--id_mitra-" data-method="GET"
      data-path="api/mitra/{id_mitra}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mitra--id_mitra-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mitra--id_mitra-"
                    onclick="tryItOut('GETapi-mitra--id_mitra-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mitra--id_mitra-"
                    onclick="cancelTryOut('GETapi-mitra--id_mitra-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mitra--id_mitra-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mitra/{id_mitra}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mitra--id_mitra-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mitra--id_mitra-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_mitra</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_mitra"                data-endpoint="GETapi-mitra--id_mitra-"
               value="MT001"
               data-component="url">
    <br>
<p>Example: <code>MT001</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-mitra-update--id_mitra-">PUT api/mitra/update/{id_mitra}</h2>

<p>
</p>



<span id="example-requests-PUTapi-mitra-update--id_mitra-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/mitra/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mitra/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-mitra-update--id_mitra-">
</span>
<span id="execution-results-PUTapi-mitra-update--id_mitra-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-mitra-update--id_mitra-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-mitra-update--id_mitra-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-mitra-update--id_mitra-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-mitra-update--id_mitra-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-mitra-update--id_mitra-" data-method="PUT"
      data-path="api/mitra/update/{id_mitra}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-mitra-update--id_mitra-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-mitra-update--id_mitra-"
                    onclick="tryItOut('PUTapi-mitra-update--id_mitra-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-mitra-update--id_mitra-"
                    onclick="cancelTryOut('PUTapi-mitra-update--id_mitra-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-mitra-update--id_mitra-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/mitra/update/{id_mitra}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-mitra-update--id_mitra-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-mitra-update--id_mitra-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_mitra</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_mitra"                data-endpoint="PUTapi-mitra-update--id_mitra-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-mitra-delete--id_mitra-">DELETE api/mitra/delete/{id_mitra}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-mitra-delete--id_mitra-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/mitra/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/mitra/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-mitra-delete--id_mitra-">
</span>
<span id="execution-results-DELETEapi-mitra-delete--id_mitra-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-mitra-delete--id_mitra-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-mitra-delete--id_mitra-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-mitra-delete--id_mitra-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-mitra-delete--id_mitra-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-mitra-delete--id_mitra-" data-method="DELETE"
      data-path="api/mitra/delete/{id_mitra}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-mitra-delete--id_mitra-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-mitra-delete--id_mitra-"
                    onclick="tryItOut('DELETEapi-mitra-delete--id_mitra-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-mitra-delete--id_mitra-"
                    onclick="cancelTryOut('DELETEapi-mitra-delete--id_mitra-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-mitra-delete--id_mitra-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/mitra/delete/{id_mitra}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-mitra-delete--id_mitra-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-mitra-delete--id_mitra-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_mitra</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_mitra"                data-endpoint="DELETEapi-mitra-delete--id_mitra-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-programmagang">GET api/programmagang</h2>

<p>
</p>



<span id="example-requests-GETapi-programmagang">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/programmagang" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/programmagang"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-programmagang">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 53
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id_program&quot;: &quot;BN0001&quot;,
        &quot;nama_program&quot;: &quot;Content Creator&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: null,
        &quot;kuota&quot;: 30,
        &quot;lokasi_penempatan&quot;: &quot;Tiga Serangkai Office&quot;,
        &quot;syarat&quot;: &quot;IPK Minimal 3.0,&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Melakukan pembuatan konten dengan vscode&quot;,
        &quot;dampak_program&quot;: &quot;Bisa membuat konten&quot;,
        &quot;prodi&quot;: [
            &quot;IF&quot;,
            &quot;SI&quot;
        ],
        &quot;created_at&quot;: &quot;2026-03-30T03:54:27.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-03-30T03:54:27.000000Z&quot;
    },
    {
        &quot;id_program&quot;: &quot;BN001&quot;,
        &quot;nama_program&quot;: &quot;Pelatihan Bela Negara Dasar&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-05-15&quot;,
        &quot;kuota&quot;: 60,
        &quot;lokasi_penempatan&quot;: &quot;Magelang&quot;,
        &quot;syarat&quot;: &quot;Sehat jasmani rohani&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pelatihan kedisiplinan nasional&quot;,
        &quot;dampak_program&quot;: &quot;Meningkatkan nasionalisme mahasiswa&quot;,
        &quot;prodi&quot;: [
            &quot;IF&quot;
        ],
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2026-03-29T16:09:44.000000Z&quot;
    },
    {
        &quot;id_program&quot;: &quot;BN002&quot;,
        &quot;nama_program&quot;: &quot;Cyber Defense Training&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Bela Negara&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-05-18&quot;,
        &quot;kuota&quot;: 30,
        &quot;lokasi_penempatan&quot;: &quot;Jakarta&quot;,
        &quot;syarat&quot;: &quot;Dasar keamanan IT&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Simulasi pertahanan siber&quot;,
        &quot;dampak_program&quot;: &quot;Kontribusi keamanan digital nasional&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;BN003&quot;,
        &quot;nama_program&quot;: &quot;Leadership Camp Bela Negara&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Bela Negara&quot;,
        &quot;id_mitra&quot;: &quot;MT003&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-05-20&quot;,
        &quot;kuota&quot;: 45,
        &quot;lokasi_penempatan&quot;: &quot;Bogor&quot;,
        &quot;syarat&quot;: &quot;Mental leadership&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pelatihan kepemimpinan nasional&quot;,
        &quot;dampak_program&quot;: &quot;Karakter kepemimpinan kuat&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;KM001&quot;,
        &quot;nama_program&quot;: &quot;Kampus Mengajar SD&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Kampus Mengajar&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-05-30&quot;,
        &quot;kuota&quot;: 40,
        &quot;lokasi_penempatan&quot;: &quot;Solo Raya&quot;,
        &quot;syarat&quot;: &quot;Suka mengajar&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pendampingan literasi sekolah&quot;,
        &quot;dampak_program&quot;: &quot;Meningkatkan kualitas pendidikan dasar&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;KM002&quot;,
        &quot;nama_program&quot;: &quot;Kampus Mengajar SMP&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Kampus Mengajar&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-02&quot;,
        &quot;kuota&quot;: 35,
        &quot;lokasi_penempatan&quot;: &quot;Semarang&quot;,
        &quot;syarat&quot;: &quot;IPK minimal 2.75&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Asistensi pembelajaran teknologi&quot;,
        &quot;dampak_program&quot;: &quot;Mahasiswa berkontribusi di sekolah&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;KM003&quot;,
        &quot;nama_program&quot;: &quot;Kampus Mengajar Digital&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Kampus Mengajar&quot;,
        &quot;id_mitra&quot;: &quot;MT003&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-05&quot;,
        &quot;kuota&quot;: 30,
        &quot;lokasi_penempatan&quot;: &quot;Remote&quot;,
        &quot;syarat&quot;: &quot;Laptop pribadi&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pembelajaran digital jarak jauh&quot;,
        &quot;dampak_program&quot;: &quot;Adaptasi teknologi pendidikan&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;KT001&quot;,
        &quot;nama_program&quot;: &quot;KKN Desa Digital&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;KKN Tematik&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-20&quot;,
        &quot;kuota&quot;: 30,
        &quot;lokasi_penempatan&quot;: &quot;Klaten, Jawa Tengah&quot;,
        &quot;syarat&quot;: &quot;Siap terjun ke masyarakat&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Digitalisasi UMKM desa&quot;,
        &quot;dampak_program&quot;: &quot;Pemberdayaan masyarakat berbasis IT&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;KT002&quot;,
        &quot;nama_program&quot;: &quot;KKN Edukasi Teknologi&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;KKN Tematik&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-22&quot;,
        &quot;kuota&quot;: 25,
        &quot;lokasi_penempatan&quot;: &quot;Magelang&quot;,
        &quot;syarat&quot;: &quot;Mahasiswa lintas prodi&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pelatihan teknologi dasar&quot;,
        &quot;dampak_program&quot;: &quot;Meningkatkan literasi digital masyarakat&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;KT003&quot;,
        &quot;nama_program&quot;: &quot;KKN Smart Village&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;KKN Tematik&quot;,
        &quot;id_mitra&quot;: &quot;MT003&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-25&quot;,
        &quot;kuota&quot;: 20,
        &quot;lokasi_penempatan&quot;: &quot;Wonogiri&quot;,
        &quot;syarat&quot;: &quot;Komunikatif dan adaptif&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Implementasi website desa&quot;,
        &quot;dampak_program&quot;: &quot;Desa berbasis sistem informasi&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;KW001&quot;,
        &quot;nama_program&quot;: &quot;Startup Digital Mahasiswa&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Kewirausahaan&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-01&quot;,
        &quot;kuota&quot;: 20,
        &quot;lokasi_penempatan&quot;: &quot;Online&quot;,
        &quot;syarat&quot;: &quot;Ide bisnis digital&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pengembangan startup dari nol&quot;,
        &quot;dampak_program&quot;: &quot;Mahasiswa siap berwirausaha&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;KW002&quot;,
        &quot;nama_program&quot;: &quot;Bisnis UMKM Kreatif&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Kewirausahaan&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-03&quot;,
        &quot;kuota&quot;: 18,
        &quot;lokasi_penempatan&quot;: &quot;Surakarta&quot;,
        &quot;syarat&quot;: &quot;Minat bisnis&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pendampingan bisnis lokal&quot;,
        &quot;dampak_program&quot;: &quot;Meningkatkan ekonomi kreatif&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;KW003&quot;,
        &quot;nama_program&quot;: &quot;Technopreneur Camp&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Kewirausahaan&quot;,
        &quot;id_mitra&quot;: &quot;MT003&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-05&quot;,
        &quot;kuota&quot;: 15,
        &quot;lokasi_penempatan&quot;: &quot;Malang&quot;,
        &quot;syarat&quot;: &quot;Dasar teknologi&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Bootcamp bisnis teknologi&quot;,
        &quot;dampak_program&quot;: &quot;Membentuk technopreneur muda&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;MG001&quot;,
        &quot;nama_program&quot;: &quot;Backend Developer Laravel&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-01&quot;,
        &quot;kuota&quot;: 8,
        &quot;lokasi_penempatan&quot;: &quot;Jakarta (Hybrid)&quot;,
        &quot;syarat&quot;: &quot;Menguasai dasar Laravel&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pengembangan API dan database&quot;,
        &quot;dampak_program&quot;: &quot;Skill backend production ready&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;MG002&quot;,
        &quot;nama_program&quot;: &quot;Network Engineer Intern&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-03&quot;,
        &quot;kuota&quot;: 6,
        &quot;lokasi_penempatan&quot;: &quot;Bandung (Onsite)&quot;,
        &quot;syarat&quot;: &quot;Dasar jaringan komputer&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Konfigurasi jaringan perusahaan&quot;,
        &quot;dampak_program&quot;: &quot;Pengalaman implementasi jaringan nyata&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;MG003&quot;,
        &quot;nama_program&quot;: &quot;DevOps Engineer Intern&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT003&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-05&quot;,
        &quot;kuota&quot;: 5,
        &quot;lokasi_penempatan&quot;: &quot;Remote&quot;,
        &quot;syarat&quot;: &quot;Dasar Linux dan Git&quot;,
        &quot;deskripsi_silabus&quot;: &quot;CI/CD dan deployment server&quot;,
        &quot;dampak_program&quot;: &quot;Pemahaman DevOps workflow&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;MM001&quot;,
        &quot;nama_program&quot;: &quot;Frontend Developer Web&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-15&quot;,
        &quot;kuota&quot;: 10,
        &quot;lokasi_penempatan&quot;: &quot;Jakarta (Hybrid)&quot;,
        &quot;syarat&quot;: &quot;Mahasiswa aktif Informatika&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pengembangan UI website menggunakan HTML, CSS, JavaScript, dan framework frontend&quot;,
        &quot;dampak_program&quot;: &quot;Meningkatkan kemampuan frontend development dan kolaborasi tim&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;MM002&quot;,
        &quot;nama_program&quot;: &quot;Backend Developer API&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-18&quot;,
        &quot;kuota&quot;: 8,
        &quot;lokasi_penempatan&quot;: &quot;Bandung (Onsite)&quot;,
        &quot;syarat&quot;: &quot;Menguasai dasar PHP / Laravel&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pengembangan REST API dan integrasi database&quot;,
        &quot;dampak_program&quot;: &quot;Memahami arsitektur backend dan pengolahan data&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;MM003&quot;,
        &quot;nama_program&quot;: &quot;UI/UX Designer&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-20&quot;,
        &quot;kuota&quot;: 6,
        &quot;lokasi_penempatan&quot;: &quot;Jakarta (Onsite)&quot;,
        &quot;syarat&quot;: &quot;Mampu menggunakan Figma&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Perancangan UI/UX aplikasi berbasis web&quot;,
        &quot;dampak_program&quot;: &quot;Meningkatkan skill desain produk digital&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;MM004&quot;,
        &quot;nama_program&quot;: &quot;Data Analyst&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-22&quot;,
        &quot;kuota&quot;: 5,
        &quot;lokasi_penempatan&quot;: &quot;Surabaya (Onsite)&quot;,
        &quot;syarat&quot;: &quot;Menguasai Excel dan SQL dasar&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Analisis data operasional perusahaan&quot;,
        &quot;dampak_program&quot;: &quot;Melatih kemampuan analisis dan visualisasi data&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;MM005&quot;,
        &quot;nama_program&quot;: &quot;IT Support&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-25&quot;,
        &quot;kuota&quot;: 7,
        &quot;lokasi_penempatan&quot;: &quot;221B Baker Street, London NW1 6XE, United Kingdom&quot;,
        &quot;syarat&quot;: &quot;Memahami dasar jaringan komputer&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Support sistem dan infrastruktur IT&quot;,
        &quot;dampak_program&quot;: &quot;Memahami troubleshooting dan maintenance sistem&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;MM006&quot;,
        &quot;nama_program&quot;: &quot;Quality Assurance&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-28&quot;,
        &quot;kuota&quot;: 4,
        &quot;lokasi_penempatan&quot;: &quot;88 George Street, Sydney NSW 2000, Australia&quot;,
        &quot;syarat&quot;: &quot;Teliti dan memahami testing&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pengujian sistem aplikasi dan dokumentasi bug&quot;,
        &quot;dampak_program&quot;: &quot;Meningkatkan kualitas perangkat lunak&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;PI001&quot;,
        &quot;nama_program&quot;: &quot;Proyek Independen Fullstack&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Studi Independen&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-10&quot;,
        &quot;kuota&quot;: 25,
        &quot;lokasi_penempatan&quot;: &quot;Remote&quot;,
        &quot;syarat&quot;: &quot;Dasar web programming&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pengembangan aplikasi fullstack&quot;,
        &quot;dampak_program&quot;: &quot;Portofolio project nyata&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;PI002&quot;,
        &quot;nama_program&quot;: &quot;Game Development Project&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Studi Independen&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-12&quot;,
        &quot;kuota&quot;: 20,
        &quot;lokasi_penempatan&quot;: &quot;Online&quot;,
        &quot;syarat&quot;: &quot;Dasar Unity&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pembuatan game indie&quot;,
        &quot;dampak_program&quot;: &quot;Skill kreatif dan teknis meningkat&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;PI003&quot;,
        &quot;nama_program&quot;: &quot;AI Chatbot Project&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Studi Independen&quot;,
        &quot;id_mitra&quot;: &quot;MT003&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-14&quot;,
        &quot;kuota&quot;: 15,
        &quot;lokasi_penempatan&quot;: &quot;Remote&quot;,
        &quot;syarat&quot;: &quot;Python dasar&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Membangun chatbot AI&quot;,
        &quot;dampak_program&quot;: &quot;Pengalaman pengembangan AI&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;PK001&quot;,
        &quot;nama_program&quot;: &quot;Relawan Bencana Alam&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Program Kemanusiaan&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-18&quot;,
        &quot;kuota&quot;: 50,
        &quot;lokasi_penempatan&quot;: &quot;DIY &amp; Jateng&quot;,
        &quot;syarat&quot;: &quot;Siap lapangan&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Manajemen bantuan kemanusiaan&quot;,
        &quot;dampak_program&quot;: &quot;Empati sosial mahasiswa meningkat&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;PK002&quot;,
        &quot;nama_program&quot;: &quot;Program Edukasi Pengungsi&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Program Kemanusiaan&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-20&quot;,
        &quot;kuota&quot;: 35,
        &quot;lokasi_penempatan&quot;: &quot;Lombok&quot;,
        &quot;syarat&quot;: &quot;Komunikatif&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pendidikan bagi pengungsi&quot;,
        &quot;dampak_program&quot;: &quot;Dampak sosial langsung&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;PK003&quot;,
        &quot;nama_program&quot;: &quot;Aksi Lingkungan Hijau&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Program Kemanusiaan&quot;,
        &quot;id_mitra&quot;: &quot;MT003&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-22&quot;,
        &quot;kuota&quot;: 40,
        &quot;lokasi_penempatan&quot;: &quot;Bali&quot;,
        &quot;syarat&quot;: &quot;Peduli lingkungan&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Konservasi dan edukasi lingkungan&quot;,
        &quot;dampak_program&quot;: &quot;Kesadaran sustainability&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;PM001&quot;,
        &quot;nama_program&quot;: &quot;Pertukaran Mahasiswa Nasional A&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Pertukaran Mahasiswa&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-10&quot;,
        &quot;kuota&quot;: 20,
        &quot;lokasi_penempatan&quot;: &quot;Yogyakarta (Onsite)&quot;,
        &quot;syarat&quot;: &quot;Mahasiswa aktif semester 4&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pertukaran akademik lintas kampus&quot;,
        &quot;dampak_program&quot;: &quot;Menambah wawasan akademik lintas budaya&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;PM002&quot;,
        &quot;nama_program&quot;: &quot;Pertukaran Mahasiswa ASEAN&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Pertukaran Mahasiswa&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-12&quot;,
        &quot;kuota&quot;: 15,
        &quot;lokasi_penempatan&quot;: &quot;Singapore (Onsite)&quot;,
        &quot;syarat&quot;: &quot;IPK minimal 3.0&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Program kolaborasi universitas ASEAN&quot;,
        &quot;dampak_program&quot;: &quot;Pengalaman internasional mahasiswa&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;PM003&quot;,
        &quot;nama_program&quot;: &quot;Student Exchange Jepang&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Pertukaran Mahasiswa&quot;,
        &quot;id_mitra&quot;: &quot;MT003&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-06-15&quot;,
        &quot;kuota&quot;: 10,
        &quot;lokasi_penempatan&quot;: &quot;Osaka (Onsite)&quot;,
        &quot;syarat&quot;: &quot;Kemampuan bahasa Inggris&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Belajar teknologi di kampus mitra Jepang&quot;,
        &quot;dampak_program&quot;: &quot;Meningkatkan kompetensi global&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;RS001&quot;,
        &quot;nama_program&quot;: &quot;Riset AI Vision&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Riset&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-10&quot;,
        &quot;kuota&quot;: 10,
        &quot;lokasi_penempatan&quot;: &quot;Bandung Lab AI&quot;,
        &quot;syarat&quot;: &quot;Dasar Machine Learning&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Penelitian computer vision&quot;,
        &quot;dampak_program&quot;: &quot;Publikasi ilmiah mahasiswa&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;RS002&quot;,
        &quot;nama_program&quot;: &quot;Riset Sistem Informasi&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Riset&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-12&quot;,
        &quot;kuota&quot;: 12,
        &quot;lokasi_penempatan&quot;: &quot;Jakarta Research Center&quot;,
        &quot;syarat&quot;: &quot;Menguasai UML&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pengembangan sistem enterprise&quot;,
        &quot;dampak_program&quot;: &quot;Meningkatkan kemampuan analisis sistem&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;RS003&quot;,
        &quot;nama_program&quot;: &quot;Riset Cyber Security&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Riset&quot;,
        &quot;id_mitra&quot;: &quot;MT003&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-07-15&quot;,
        &quot;kuota&quot;: 8,
        &quot;lokasi_penempatan&quot;: &quot;Remote&quot;,
        &quot;syarat&quot;: &quot;Minat keamanan jaringan&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Analisis vulnerability aplikasi&quot;,
        &quot;dampak_program&quot;: &quot;Kesadaran keamanan digital meningkat&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;SI001&quot;,
        &quot;nama_program&quot;: &quot;Studi Independen Web Development&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Studi Independen&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-05&quot;,
        &quot;kuota&quot;: 30,
        &quot;lokasi_penempatan&quot;: &quot;Online / Remote&quot;,
        &quot;syarat&quot;: &quot;Mahasiswa minimal semester 5&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pembelajaran intensif fullstack web development&quot;,
        &quot;dampak_program&quot;: &quot;Menghasilkan lulusan siap industri&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;SI002&quot;,
        &quot;nama_program&quot;: &quot;Studi Independen Data Science&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Studi Independen&quot;,
        &quot;id_mitra&quot;: &quot;MT002&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-08&quot;,
        &quot;kuota&quot;: 25,
        &quot;lokasi_penempatan&quot;: &quot;Alexanderplatz 5, 10178 Berlin, Germany&quot;,
        &quot;syarat&quot;: &quot;Dasar statistika dan Python&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pembelajaran data science dan machine learning&quot;,
        &quot;dampak_program&quot;: &quot;Menguasai analisis data skala besar&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;SI003&quot;,
        &quot;nama_program&quot;: &quot;Studi Independen Cyber Security&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Studi Independen&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-10&quot;,
        &quot;kuota&quot;: 20,
        &quot;lokasi_penempatan&quot;: &quot;1-7-1 Shibuya, Shibuya City, Tokyo 150-0002, Japan&quot;,
        &quot;syarat&quot;: &quot;Minat keamanan sistem&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pembelajaran keamanan jaringan dan sistem&quot;,
        &quot;dampak_program&quot;: &quot;Meningkatkan kesadaran dan skill keamanan&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;SI004&quot;,
        &quot;nama_program&quot;: &quot;Studi Independen Mobile App&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Studi Independen&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-12&quot;,
        &quot;kuota&quot;: 15,
        &quot;lokasi_penempatan&quot;: &quot;742 Evergreen Terrace, Springfield, IL 62704, United States&quot;,
        &quot;syarat&quot;: &quot;Dasar pemrograman mobile&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pengembangan aplikasi Android&quot;,
        &quot;dampak_program&quot;: &quot;Menguasai pengembangan aplikasi mobile&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id_program&quot;: &quot;SI005&quot;,
        &quot;nama_program&quot;: &quot;Studi Independen Cloud Computing&quot;,
        &quot;program_dimulai&quot;: null,
        &quot;program_selesai&quot;: null,
        &quot;jenis_bkp&quot;: &quot;Studi Independen&quot;,
        &quot;id_mitra&quot;: &quot;MT001&quot;,
        &quot;periode&quot;: &quot;2026 Ganjil&quot;,
        &quot;deadline&quot;: &quot;2026-08-15&quot;,
        &quot;kuota&quot;: 18,
        &quot;lokasi_penempatan&quot;: &quot;Perumahan Flamboyan Indah F5, Blulukan, Colomadu, Karanganyar, Jawa Tengah, Indonesia&quot;,
        &quot;syarat&quot;: &quot;Dasar jaringan dan server&quot;,
        &quot;deskripsi_silabus&quot;: &quot;Pembelajaran cloud infrastructure dan deployment&quot;,
        &quot;dampak_program&quot;: &quot;Memahami sistem cloud modern&quot;,
        &quot;prodi&quot;: null,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-programmagang" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-programmagang"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-programmagang"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-programmagang" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-programmagang">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-programmagang" data-method="GET"
      data-path="api/programmagang"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-programmagang', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-programmagang"
                    onclick="tryItOut('GETapi-programmagang');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-programmagang"
                    onclick="cancelTryOut('GETapi-programmagang');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-programmagang"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/programmagang</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-programmagang"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-programmagang"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-programmagang-store">POST api/programmagang/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-programmagang-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/programmagang/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/programmagang/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-programmagang-store">
</span>
<span id="execution-results-POSTapi-programmagang-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-programmagang-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-programmagang-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-programmagang-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-programmagang-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-programmagang-store" data-method="POST"
      data-path="api/programmagang/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-programmagang-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-programmagang-store"
                    onclick="tryItOut('POSTapi-programmagang-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-programmagang-store"
                    onclick="cancelTryOut('POSTapi-programmagang-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-programmagang-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/programmagang/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-programmagang-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-programmagang-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-programmagang--id_program-">GET api/programmagang/{id_program}</h2>

<p>
</p>



<span id="example-requests-GETapi-programmagang--id_program-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/programmagang/BN0001" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/programmagang/BN0001"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-programmagang--id_program-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 52
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id_program&quot;: &quot;BN0001&quot;,
    &quot;nama_program&quot;: &quot;Content Creator&quot;,
    &quot;program_dimulai&quot;: null,
    &quot;program_selesai&quot;: null,
    &quot;jenis_bkp&quot;: &quot;Magang Mandiri&quot;,
    &quot;id_mitra&quot;: &quot;MT002&quot;,
    &quot;periode&quot;: &quot;2026 Ganjil&quot;,
    &quot;deadline&quot;: null,
    &quot;kuota&quot;: 30,
    &quot;lokasi_penempatan&quot;: &quot;Tiga Serangkai Office&quot;,
    &quot;syarat&quot;: &quot;IPK Minimal 3.0,&quot;,
    &quot;deskripsi_silabus&quot;: &quot;Melakukan pembuatan konten dengan vscode&quot;,
    &quot;dampak_program&quot;: &quot;Bisa membuat konten&quot;,
    &quot;prodi&quot;: [
        &quot;IF&quot;,
        &quot;SI&quot;
    ],
    &quot;created_at&quot;: &quot;2026-03-30T03:54:27.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2026-03-30T03:54:27.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-programmagang--id_program-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-programmagang--id_program-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-programmagang--id_program-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-programmagang--id_program-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-programmagang--id_program-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-programmagang--id_program-" data-method="GET"
      data-path="api/programmagang/{id_program}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-programmagang--id_program-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-programmagang--id_program-"
                    onclick="tryItOut('GETapi-programmagang--id_program-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-programmagang--id_program-"
                    onclick="cancelTryOut('GETapi-programmagang--id_program-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-programmagang--id_program-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/programmagang/{id_program}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-programmagang--id_program-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-programmagang--id_program-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_program</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_program"                data-endpoint="GETapi-programmagang--id_program-"
               value="BN0001"
               data-component="url">
    <br>
<p>Example: <code>BN0001</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-programmagang-update--id_program-">PUT api/programmagang/update/{id_program}</h2>

<p>
</p>



<span id="example-requests-PUTapi-programmagang-update--id_program-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/programmagang/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/programmagang/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-programmagang-update--id_program-">
</span>
<span id="execution-results-PUTapi-programmagang-update--id_program-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-programmagang-update--id_program-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-programmagang-update--id_program-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-programmagang-update--id_program-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-programmagang-update--id_program-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-programmagang-update--id_program-" data-method="PUT"
      data-path="api/programmagang/update/{id_program}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-programmagang-update--id_program-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-programmagang-update--id_program-"
                    onclick="tryItOut('PUTapi-programmagang-update--id_program-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-programmagang-update--id_program-"
                    onclick="cancelTryOut('PUTapi-programmagang-update--id_program-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-programmagang-update--id_program-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/programmagang/update/{id_program}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-programmagang-update--id_program-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-programmagang-update--id_program-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_program</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_program"                data-endpoint="PUTapi-programmagang-update--id_program-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-programmagang-delete--id_program-">DELETE api/programmagang/delete/{id_program}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-programmagang-delete--id_program-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/programmagang/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/programmagang/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-programmagang-delete--id_program-">
</span>
<span id="execution-results-DELETEapi-programmagang-delete--id_program-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-programmagang-delete--id_program-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-programmagang-delete--id_program-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-programmagang-delete--id_program-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-programmagang-delete--id_program-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-programmagang-delete--id_program-" data-method="DELETE"
      data-path="api/programmagang/delete/{id_program}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-programmagang-delete--id_program-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-programmagang-delete--id_program-"
                    onclick="tryItOut('DELETEapi-programmagang-delete--id_program-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-programmagang-delete--id_program-"
                    onclick="cancelTryOut('DELETEapi-programmagang-delete--id_program-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-programmagang-delete--id_program-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/programmagang/delete/{id_program}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-programmagang-delete--id_program-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-programmagang-delete--id_program-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_program</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_program"                data-endpoint="DELETEapi-programmagang-delete--id_program-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-pendaftaran-store">POST api/pendaftaran/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-pendaftaran-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pendaftaran/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"program_id\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pendaftaran/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "program_id": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pendaftaran-store">
</span>
<span id="execution-results-POSTapi-pendaftaran-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pendaftaran-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pendaftaran-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pendaftaran-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pendaftaran-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pendaftaran-store" data-method="POST"
      data-path="api/pendaftaran/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pendaftaran-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pendaftaran-store"
                    onclick="tryItOut('POSTapi-pendaftaran-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pendaftaran-store"
                    onclick="cancelTryOut('POSTapi-pendaftaran-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pendaftaran-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pendaftaran/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pendaftaran-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pendaftaran-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>program_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="program_id"                data-endpoint="POSTapi-pendaftaran-store"
               value="architecto"
               data-component="body">
    <br>
<p>Must match an existing stored value. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-pembimbing">GET api/pembimbing</h2>

<p>
</p>



<span id="example-requests-GETapi-pembimbing">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pembimbing" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembimbing"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pembimbing">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 51
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Tidak ada data pembimbing ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pembimbing" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pembimbing"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pembimbing"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pembimbing" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pembimbing">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pembimbing" data-method="GET"
      data-path="api/pembimbing"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pembimbing', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pembimbing"
                    onclick="tryItOut('GETapi-pembimbing');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pembimbing"
                    onclick="cancelTryOut('GETapi-pembimbing');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pembimbing"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pembimbing</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pembimbing"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pembimbing"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-pembimbing-store">POST api/pembimbing/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-pembimbing-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pembimbing/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembimbing/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pembimbing-store">
</span>
<span id="execution-results-POSTapi-pembimbing-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pembimbing-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pembimbing-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pembimbing-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pembimbing-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pembimbing-store" data-method="POST"
      data-path="api/pembimbing/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pembimbing-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pembimbing-store"
                    onclick="tryItOut('POSTapi-pembimbing-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pembimbing-store"
                    onclick="cancelTryOut('POSTapi-pembimbing-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pembimbing-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pembimbing/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pembimbing-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pembimbing-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-pembimbing--nidn-">GET api/pembimbing/{nidn}</h2>

<p>
</p>



<span id="example-requests-GETapi-pembimbing--nidn-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pembimbing/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembimbing/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pembimbing--nidn-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 50
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Pembimbing dengan nuptk 16 tidak ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pembimbing--nidn-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pembimbing--nidn-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pembimbing--nidn-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pembimbing--nidn-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pembimbing--nidn-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pembimbing--nidn-" data-method="GET"
      data-path="api/pembimbing/{nidn}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pembimbing--nidn-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pembimbing--nidn-"
                    onclick="tryItOut('GETapi-pembimbing--nidn-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pembimbing--nidn-"
                    onclick="cancelTryOut('GETapi-pembimbing--nidn-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pembimbing--nidn-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pembimbing/{nidn}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pembimbing--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pembimbing--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nidn</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="nidn"                data-endpoint="GETapi-pembimbing--nidn-"
               value="16"
               data-component="url">
    <br>
<p>Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-pembimbing-update--nidn-">PUT api/pembimbing/update/{nidn}</h2>

<p>
</p>



<span id="example-requests-PUTapi-pembimbing-update--nidn-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/pembimbing/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembimbing/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-pembimbing-update--nidn-">
</span>
<span id="execution-results-PUTapi-pembimbing-update--nidn-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-pembimbing-update--nidn-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-pembimbing-update--nidn-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-pembimbing-update--nidn-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-pembimbing-update--nidn-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-pembimbing-update--nidn-" data-method="PUT"
      data-path="api/pembimbing/update/{nidn}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-pembimbing-update--nidn-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-pembimbing-update--nidn-"
                    onclick="tryItOut('PUTapi-pembimbing-update--nidn-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-pembimbing-update--nidn-"
                    onclick="cancelTryOut('PUTapi-pembimbing-update--nidn-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-pembimbing-update--nidn-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/pembimbing/update/{nidn}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-pembimbing-update--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-pembimbing-update--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nidn</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nidn"                data-endpoint="PUTapi-pembimbing-update--nidn-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-pembimbing-delete--nidn-">DELETE api/pembimbing/delete/{nidn}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-pembimbing-delete--nidn-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/pembimbing/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pembimbing/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-pembimbing-delete--nidn-">
</span>
<span id="execution-results-DELETEapi-pembimbing-delete--nidn-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-pembimbing-delete--nidn-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-pembimbing-delete--nidn-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-pembimbing-delete--nidn-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-pembimbing-delete--nidn-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-pembimbing-delete--nidn-" data-method="DELETE"
      data-path="api/pembimbing/delete/{nidn}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-pembimbing-delete--nidn-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-pembimbing-delete--nidn-"
                    onclick="tryItOut('DELETEapi-pembimbing-delete--nidn-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-pembimbing-delete--nidn-"
                    onclick="cancelTryOut('DELETEapi-pembimbing-delete--nidn-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-pembimbing-delete--nidn-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/pembimbing/delete/{nidn}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-pembimbing-delete--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-pembimbing-delete--nidn-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nidn</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nidn"                data-endpoint="DELETEapi-pembimbing-delete--nidn-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-logbook">GET api/logbook</h2>

<p>
</p>



<span id="example-requests-GETapi-logbook">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/logbook" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/logbook"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-logbook">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 49
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-logbook" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-logbook"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-logbook"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-logbook" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-logbook">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-logbook" data-method="GET"
      data-path="api/logbook"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-logbook', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-logbook"
                    onclick="tryItOut('GETapi-logbook');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-logbook"
                    onclick="cancelTryOut('GETapi-logbook');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-logbook"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/logbook</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-logbook"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-logbook"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-logbook-store">POST api/logbook/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-logbook-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/logbook/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"minggu_ke\": 16,
    \"tanggal_mulai\": \"2026-06-30T18:48:08\",
    \"tanggal_selesai\": \"2052-07-23\",
    \"nama_kegiatan\": \"architecto\",
    \"uraian_kegiatan\": \"architecto\",
    \"jenis_logbook\": \"kelompok\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/logbook/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "minggu_ke": 16,
    "tanggal_mulai": "2026-06-30T18:48:08",
    "tanggal_selesai": "2052-07-23",
    "nama_kegiatan": "architecto",
    "uraian_kegiatan": "architecto",
    "jenis_logbook": "kelompok"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logbook-store">
</span>
<span id="execution-results-POSTapi-logbook-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logbook-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logbook-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logbook-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logbook-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logbook-store" data-method="POST"
      data-path="api/logbook/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logbook-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logbook-store"
                    onclick="tryItOut('POSTapi-logbook-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logbook-store"
                    onclick="cancelTryOut('POSTapi-logbook-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logbook-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logbook/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logbook-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logbook-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>minggu_ke</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="minggu_ke"                data-endpoint="POSTapi-logbook-store"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tanggal_mulai</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tanggal_mulai"                data-endpoint="POSTapi-logbook-store"
               value="2026-06-30T18:48:08"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-06-30T18:48:08</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tanggal_selesai</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tanggal_selesai"                data-endpoint="POSTapi-logbook-store"
               value="2052-07-23"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after or equal to <code>tanggal_mulai</code>. Example: <code>2052-07-23</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nama_kegiatan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nama_kegiatan"                data-endpoint="POSTapi-logbook-store"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>uraian_kegiatan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="uraian_kegiatan"                data-endpoint="POSTapi-logbook-store"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>jenis_logbook</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="jenis_logbook"                data-endpoint="POSTapi-logbook-store"
               value="kelompok"
               data-component="body">
    <br>
<p>Example: <code>kelompok</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>Individu</code></li> <li><code>Kelompok</code></li> <li><code>individu</code></li> <li><code>kelompok</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-logbook--nim-">GET api/logbook/{nim}</h2>

<p>
</p>



<span id="example-requests-GETapi-logbook--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/logbook/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/logbook/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-logbook--nim-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 48
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;LogBook dengan NIDN 1 tidak ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-logbook--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-logbook--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-logbook--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-logbook--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-logbook--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-logbook--nim-" data-method="GET"
      data-path="api/logbook/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-logbook--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-logbook--nim-"
                    onclick="tryItOut('GETapi-logbook--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-logbook--nim-"
                    onclick="cancelTryOut('GETapi-logbook--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-logbook--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/logbook/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-logbook--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-logbook--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="nim"                data-endpoint="GETapi-logbook--nim-"
               value="1"
               data-component="url">
    <br>
<p>Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-logbook-update--nim-">PUT api/logbook/update/{nim}</h2>

<p>
</p>



<span id="example-requests-PUTapi-logbook-update--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/logbook/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/logbook/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-logbook-update--nim-">
</span>
<span id="execution-results-PUTapi-logbook-update--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-logbook-update--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-logbook-update--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-logbook-update--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-logbook-update--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-logbook-update--nim-" data-method="PUT"
      data-path="api/logbook/update/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-logbook-update--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-logbook-update--nim-"
                    onclick="tryItOut('PUTapi-logbook-update--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-logbook-update--nim-"
                    onclick="cancelTryOut('PUTapi-logbook-update--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-logbook-update--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/logbook/update/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-logbook-update--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-logbook-update--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="PUTapi-logbook-update--nim-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-logbook-delete--nim-">DELETE api/logbook/delete/{nim}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-logbook-delete--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/logbook/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/logbook/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-logbook-delete--nim-">
</span>
<span id="execution-results-DELETEapi-logbook-delete--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-logbook-delete--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-logbook-delete--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-logbook-delete--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-logbook-delete--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-logbook-delete--nim-" data-method="DELETE"
      data-path="api/logbook/delete/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-logbook-delete--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-logbook-delete--nim-"
                    onclick="tryItOut('DELETEapi-logbook-delete--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-logbook-delete--nim-"
                    onclick="cancelTryOut('DELETEapi-logbook-delete--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-logbook-delete--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/logbook/delete/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-logbook-delete--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-logbook-delete--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="DELETEapi-logbook-delete--nim-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-laporan">GET api/laporan</h2>

<p>
</p>



<span id="example-requests-GETapi-laporan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/laporan" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/laporan"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-laporan">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 47
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Tidak ada data laporan ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-laporan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-laporan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-laporan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-laporan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-laporan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-laporan" data-method="GET"
      data-path="api/laporan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-laporan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-laporan"
                    onclick="tryItOut('GETapi-laporan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-laporan"
                    onclick="cancelTryOut('GETapi-laporan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-laporan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/laporan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-laporan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-laporan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-laporan-store">POST api/laporan/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-laporan-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/laporan/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/laporan/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-laporan-store">
</span>
<span id="execution-results-POSTapi-laporan-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-laporan-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-laporan-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-laporan-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-laporan-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-laporan-store" data-method="POST"
      data-path="api/laporan/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-laporan-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-laporan-store"
                    onclick="tryItOut('POSTapi-laporan-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-laporan-store"
                    onclick="cancelTryOut('POSTapi-laporan-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-laporan-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/laporan/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-laporan-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-laporan-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-laporan--id_laporan-">GET api/laporan/{id_laporan}</h2>

<p>
</p>



<span id="example-requests-GETapi-laporan--id_laporan-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/laporan/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/laporan/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-laporan--id_laporan-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 46
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Laporan dengan NIM 16 tidak ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-laporan--id_laporan-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-laporan--id_laporan-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-laporan--id_laporan-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-laporan--id_laporan-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-laporan--id_laporan-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-laporan--id_laporan-" data-method="GET"
      data-path="api/laporan/{id_laporan}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-laporan--id_laporan-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-laporan--id_laporan-"
                    onclick="tryItOut('GETapi-laporan--id_laporan-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-laporan--id_laporan-"
                    onclick="cancelTryOut('GETapi-laporan--id_laporan-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-laporan--id_laporan-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/laporan/{id_laporan}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-laporan--id_laporan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-laporan--id_laporan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_laporan</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_laporan"                data-endpoint="GETapi-laporan--id_laporan-"
               value="16"
               data-component="url">
    <br>
<p>Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-laporan-update--id_laporan-">PUT api/laporan/update/{id_laporan}</h2>

<p>
</p>



<span id="example-requests-PUTapi-laporan-update--id_laporan-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/laporan/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/laporan/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-laporan-update--id_laporan-">
</span>
<span id="execution-results-PUTapi-laporan-update--id_laporan-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-laporan-update--id_laporan-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-laporan-update--id_laporan-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-laporan-update--id_laporan-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-laporan-update--id_laporan-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-laporan-update--id_laporan-" data-method="PUT"
      data-path="api/laporan/update/{id_laporan}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-laporan-update--id_laporan-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-laporan-update--id_laporan-"
                    onclick="tryItOut('PUTapi-laporan-update--id_laporan-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-laporan-update--id_laporan-"
                    onclick="cancelTryOut('PUTapi-laporan-update--id_laporan-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-laporan-update--id_laporan-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/laporan/update/{id_laporan}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-laporan-update--id_laporan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-laporan-update--id_laporan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_laporan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_laporan"                data-endpoint="PUTapi-laporan-update--id_laporan-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-laporan-delete--id_laporan-">DELETE api/laporan/delete/{id_laporan}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-laporan-delete--id_laporan-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/laporan/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/laporan/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-laporan-delete--id_laporan-">
</span>
<span id="execution-results-DELETEapi-laporan-delete--id_laporan-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-laporan-delete--id_laporan-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-laporan-delete--id_laporan-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-laporan-delete--id_laporan-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-laporan-delete--id_laporan-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-laporan-delete--id_laporan-" data-method="DELETE"
      data-path="api/laporan/delete/{id_laporan}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-laporan-delete--id_laporan-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-laporan-delete--id_laporan-"
                    onclick="tryItOut('DELETEapi-laporan-delete--id_laporan-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-laporan-delete--id_laporan-"
                    onclick="cancelTryOut('DELETEapi-laporan-delete--id_laporan-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-laporan-delete--id_laporan-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/laporan/delete/{id_laporan}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-laporan-delete--id_laporan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-laporan-delete--id_laporan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_laporan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_laporan"                data-endpoint="DELETEapi-laporan-delete--id_laporan-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-penilaian">GET api/penilaian</h2>

<p>
</p>



<span id="example-requests-GETapi-penilaian">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/penilaian" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/penilaian"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-penilaian">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 45
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Tidak ada data penilaian ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-penilaian" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-penilaian"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-penilaian"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-penilaian" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-penilaian">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-penilaian" data-method="GET"
      data-path="api/penilaian"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-penilaian', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-penilaian"
                    onclick="tryItOut('GETapi-penilaian');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-penilaian"
                    onclick="cancelTryOut('GETapi-penilaian');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-penilaian"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/penilaian</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-penilaian"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-penilaian"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-penilaian-store">POST api/penilaian/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-penilaian-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/penilaian/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/penilaian/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-penilaian-store">
</span>
<span id="execution-results-POSTapi-penilaian-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-penilaian-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-penilaian-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-penilaian-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-penilaian-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-penilaian-store" data-method="POST"
      data-path="api/penilaian/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-penilaian-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-penilaian-store"
                    onclick="tryItOut('POSTapi-penilaian-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-penilaian-store"
                    onclick="cancelTryOut('POSTapi-penilaian-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-penilaian-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/penilaian/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-penilaian-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-penilaian-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-penilaian--nim-">GET api/penilaian/{nim}</h2>

<p>
</p>



<span id="example-requests-GETapi-penilaian--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/penilaian/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/penilaian/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-penilaian--nim-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 44
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Penilaian dengan NIM 16 tidak ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-penilaian--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-penilaian--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-penilaian--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-penilaian--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-penilaian--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-penilaian--nim-" data-method="GET"
      data-path="api/penilaian/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-penilaian--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-penilaian--nim-"
                    onclick="tryItOut('GETapi-penilaian--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-penilaian--nim-"
                    onclick="cancelTryOut('GETapi-penilaian--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-penilaian--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/penilaian/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-penilaian--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-penilaian--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="nim"                data-endpoint="GETapi-penilaian--nim-"
               value="16"
               data-component="url">
    <br>
<p>Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-penilaian-update--nim-">PUT api/penilaian/update/{nim}</h2>

<p>
</p>



<span id="example-requests-PUTapi-penilaian-update--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/penilaian/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/penilaian/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-penilaian-update--nim-">
</span>
<span id="execution-results-PUTapi-penilaian-update--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-penilaian-update--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-penilaian-update--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-penilaian-update--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-penilaian-update--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-penilaian-update--nim-" data-method="PUT"
      data-path="api/penilaian/update/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-penilaian-update--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-penilaian-update--nim-"
                    onclick="tryItOut('PUTapi-penilaian-update--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-penilaian-update--nim-"
                    onclick="cancelTryOut('PUTapi-penilaian-update--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-penilaian-update--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/penilaian/update/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-penilaian-update--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-penilaian-update--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="PUTapi-penilaian-update--nim-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-penilaian-delete--nim-">DELETE api/penilaian/delete/{nim}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-penilaian-delete--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/penilaian/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/penilaian/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-penilaian-delete--nim-">
</span>
<span id="execution-results-DELETEapi-penilaian-delete--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-penilaian-delete--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-penilaian-delete--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-penilaian-delete--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-penilaian-delete--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-penilaian-delete--nim-" data-method="DELETE"
      data-path="api/penilaian/delete/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-penilaian-delete--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-penilaian-delete--nim-"
                    onclick="tryItOut('DELETEapi-penilaian-delete--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-penilaian-delete--nim-"
                    onclick="cancelTryOut('DELETEapi-penilaian-delete--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-penilaian-delete--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/penilaian/delete/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-penilaian-delete--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-penilaian-delete--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="DELETEapi-penilaian-delete--nim-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-matakuliah">GET api/matakuliah</h2>

<p>
</p>



<span id="example-requests-GETapi-matakuliah">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/matakuliah" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/matakuliah"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-matakuliah">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 43
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id_matkul&quot;: &quot;MK001&quot;,
        &quot;kode_mk&quot;: &quot;IF201&quot;,
        &quot;nama_matkul&quot;: &quot;Workshop Framework&quot;,
        &quot;sks&quot;: 4,
        &quot;semester&quot;: &quot;5&quot;,
        &quot;prodi&quot;: &quot;Informatika&quot;,
        &quot;created_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;
    },
    {
        &quot;id_matkul&quot;: &quot;MK002&quot;,
        &quot;kode_mk&quot;: &quot;IF202&quot;,
        &quot;nama_matkul&quot;: &quot;Manajemen Proyek Sistem Informasi&quot;,
        &quot;sks&quot;: 3,
        &quot;semester&quot;: &quot;5&quot;,
        &quot;prodi&quot;: &quot;Informatika&quot;,
        &quot;created_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;
    },
    {
        &quot;id_matkul&quot;: &quot;MK003&quot;,
        &quot;kode_mk&quot;: &quot;IF203&quot;,
        &quot;nama_matkul&quot;: &quot;Etika Profesi IT&quot;,
        &quot;sks&quot;: 2,
        &quot;semester&quot;: &quot;5&quot;,
        &quot;prodi&quot;: &quot;Informatika&quot;,
        &quot;created_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;
    },
    {
        &quot;id_matkul&quot;: &quot;MK004&quot;,
        &quot;kode_mk&quot;: &quot;IF204&quot;,
        &quot;nama_matkul&quot;: &quot;Keamanan Informasi&quot;,
        &quot;sks&quot;: 3,
        &quot;semester&quot;: &quot;5&quot;,
        &quot;prodi&quot;: &quot;Informatika&quot;,
        &quot;created_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;
    },
    {
        &quot;id_matkul&quot;: &quot;MK005&quot;,
        &quot;kode_mk&quot;: &quot;IF205&quot;,
        &quot;nama_matkul&quot;: &quot;Cloud Computing&quot;,
        &quot;sks&quot;: 3,
        &quot;semester&quot;: &quot;6&quot;,
        &quot;prodi&quot;: &quot;Informatika&quot;,
        &quot;created_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;
    },
    {
        &quot;id_matkul&quot;: &quot;MK006&quot;,
        &quot;kode_mk&quot;: &quot;IF206&quot;,
        &quot;nama_matkul&quot;: &quot;Data Science Dasar&quot;,
        &quot;sks&quot;: 3,
        &quot;semester&quot;: &quot;6&quot;,
        &quot;prodi&quot;: &quot;Informatika&quot;,
        &quot;created_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;
    },
    {
        &quot;id_matkul&quot;: &quot;MK007&quot;,
        &quot;kode_mk&quot;: &quot;IF207&quot;,
        &quot;nama_matkul&quot;: &quot;Mobile Programming&quot;,
        &quot;sks&quot;: 4,
        &quot;semester&quot;: &quot;6&quot;,
        &quot;prodi&quot;: &quot;Informatika&quot;,
        &quot;created_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;
    },
    {
        &quot;id_matkul&quot;: &quot;MK008&quot;,
        &quot;kode_mk&quot;: &quot;IF208&quot;,
        &quot;nama_matkul&quot;: &quot;Bahasa Inggris Teknis&quot;,
        &quot;sks&quot;: 2,
        &quot;semester&quot;: &quot;6&quot;,
        &quot;prodi&quot;: &quot;Informatika&quot;,
        &quot;created_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-03-09T11:12:31.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-matakuliah" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-matakuliah"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-matakuliah"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-matakuliah" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-matakuliah">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-matakuliah" data-method="GET"
      data-path="api/matakuliah"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-matakuliah', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-matakuliah"
                    onclick="tryItOut('GETapi-matakuliah');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-matakuliah"
                    onclick="cancelTryOut('GETapi-matakuliah');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-matakuliah"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/matakuliah</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-matakuliah"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-matakuliah"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-matakuliah-store">POST api/matakuliah/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-matakuliah-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/matakuliah/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/matakuliah/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-matakuliah-store">
</span>
<span id="execution-results-POSTapi-matakuliah-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-matakuliah-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-matakuliah-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-matakuliah-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-matakuliah-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-matakuliah-store" data-method="POST"
      data-path="api/matakuliah/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-matakuliah-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-matakuliah-store"
                    onclick="tryItOut('POSTapi-matakuliah-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-matakuliah-store"
                    onclick="cancelTryOut('POSTapi-matakuliah-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-matakuliah-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/matakuliah/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-matakuliah-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-matakuliah-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-matakuliah--id_matkul-">GET api/matakuliah/{id_matkul}</h2>

<p>
</p>



<span id="example-requests-GETapi-matakuliah--id_matkul-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/matakuliah/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/matakuliah/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-matakuliah--id_matkul-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 42
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-matakuliah--id_matkul-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-matakuliah--id_matkul-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-matakuliah--id_matkul-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-matakuliah--id_matkul-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-matakuliah--id_matkul-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-matakuliah--id_matkul-" data-method="GET"
      data-path="api/matakuliah/{id_matkul}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-matakuliah--id_matkul-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-matakuliah--id_matkul-"
                    onclick="tryItOut('GETapi-matakuliah--id_matkul-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-matakuliah--id_matkul-"
                    onclick="cancelTryOut('GETapi-matakuliah--id_matkul-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-matakuliah--id_matkul-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/matakuliah/{id_matkul}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-matakuliah--id_matkul-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-matakuliah--id_matkul-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_matkul</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_matkul"                data-endpoint="GETapi-matakuliah--id_matkul-"
               value="16"
               data-component="url">
    <br>
<p>Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-matakuliah-update--id_matkul-">PUT api/matakuliah/update/{id_matkul}</h2>

<p>
</p>



<span id="example-requests-PUTapi-matakuliah-update--id_matkul-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/matakuliah/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/matakuliah/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-matakuliah-update--id_matkul-">
</span>
<span id="execution-results-PUTapi-matakuliah-update--id_matkul-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-matakuliah-update--id_matkul-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-matakuliah-update--id_matkul-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-matakuliah-update--id_matkul-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-matakuliah-update--id_matkul-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-matakuliah-update--id_matkul-" data-method="PUT"
      data-path="api/matakuliah/update/{id_matkul}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-matakuliah-update--id_matkul-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-matakuliah-update--id_matkul-"
                    onclick="tryItOut('PUTapi-matakuliah-update--id_matkul-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-matakuliah-update--id_matkul-"
                    onclick="cancelTryOut('PUTapi-matakuliah-update--id_matkul-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-matakuliah-update--id_matkul-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/matakuliah/update/{id_matkul}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-matakuliah-update--id_matkul-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-matakuliah-update--id_matkul-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_matkul</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_matkul"                data-endpoint="PUTapi-matakuliah-update--id_matkul-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-matakuliah-delete--id_matkul-">DELETE api/matakuliah/delete/{id_matkul}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-matakuliah-delete--id_matkul-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/matakuliah/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/matakuliah/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-matakuliah-delete--id_matkul-">
</span>
<span id="execution-results-DELETEapi-matakuliah-delete--id_matkul-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-matakuliah-delete--id_matkul-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-matakuliah-delete--id_matkul-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-matakuliah-delete--id_matkul-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-matakuliah-delete--id_matkul-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-matakuliah-delete--id_matkul-" data-method="DELETE"
      data-path="api/matakuliah/delete/{id_matkul}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-matakuliah-delete--id_matkul-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-matakuliah-delete--id_matkul-"
                    onclick="tryItOut('DELETEapi-matakuliah-delete--id_matkul-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-matakuliah-delete--id_matkul-"
                    onclick="cancelTryOut('DELETEapi-matakuliah-delete--id_matkul-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-matakuliah-delete--id_matkul-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/matakuliah/delete/{id_matkul}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-matakuliah-delete--id_matkul-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-matakuliah-delete--id_matkul-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_matkul</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_matkul"                data-endpoint="DELETEapi-matakuliah-delete--id_matkul-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-transkripmagang">GET api/transkripmagang</h2>

<p>
</p>



<span id="example-requests-GETapi-transkripmagang">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/transkripmagang" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/transkripmagang"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-transkripmagang">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 41
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Tidak ada data transkrip ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-transkripmagang" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-transkripmagang"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transkripmagang"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-transkripmagang" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transkripmagang">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-transkripmagang" data-method="GET"
      data-path="api/transkripmagang"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transkripmagang', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-transkripmagang"
                    onclick="tryItOut('GETapi-transkripmagang');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-transkripmagang"
                    onclick="cancelTryOut('GETapi-transkripmagang');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-transkripmagang"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transkripmagang</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-transkripmagang"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-transkripmagang"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-transkripmagang-store">POST api/transkripmagang/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-transkripmagang-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/transkripmagang/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/transkripmagang/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-transkripmagang-store">
</span>
<span id="execution-results-POSTapi-transkripmagang-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-transkripmagang-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-transkripmagang-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-transkripmagang-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-transkripmagang-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-transkripmagang-store" data-method="POST"
      data-path="api/transkripmagang/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-transkripmagang-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-transkripmagang-store"
                    onclick="tryItOut('POSTapi-transkripmagang-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-transkripmagang-store"
                    onclick="cancelTryOut('POSTapi-transkripmagang-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-transkripmagang-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/transkripmagang/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-transkripmagang-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-transkripmagang-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-transkripmagang--id_transkrip-">GET api/transkripmagang/{id_transkrip}</h2>

<p>
</p>



<span id="example-requests-GETapi-transkripmagang--id_transkrip-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/transkripmagang/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/transkripmagang/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-transkripmagang--id_transkrip-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 40
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;TranskripMagang dengan ID 16 tidak ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-transkripmagang--id_transkrip-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-transkripmagang--id_transkrip-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transkripmagang--id_transkrip-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-transkripmagang--id_transkrip-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transkripmagang--id_transkrip-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-transkripmagang--id_transkrip-" data-method="GET"
      data-path="api/transkripmagang/{id_transkrip}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transkripmagang--id_transkrip-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-transkripmagang--id_transkrip-"
                    onclick="tryItOut('GETapi-transkripmagang--id_transkrip-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-transkripmagang--id_transkrip-"
                    onclick="cancelTryOut('GETapi-transkripmagang--id_transkrip-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-transkripmagang--id_transkrip-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transkripmagang/{id_transkrip}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-transkripmagang--id_transkrip-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-transkripmagang--id_transkrip-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_transkrip</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_transkrip"                data-endpoint="GETapi-transkripmagang--id_transkrip-"
               value="16"
               data-component="url">
    <br>
<p>Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-transkripmagang-update--id_transkrip-">PUT api/transkripmagang/update/{id_transkrip}</h2>

<p>
</p>



<span id="example-requests-PUTapi-transkripmagang-update--id_transkrip-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/transkripmagang/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/transkripmagang/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-transkripmagang-update--id_transkrip-">
</span>
<span id="execution-results-PUTapi-transkripmagang-update--id_transkrip-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-transkripmagang-update--id_transkrip-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-transkripmagang-update--id_transkrip-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-transkripmagang-update--id_transkrip-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-transkripmagang-update--id_transkrip-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-transkripmagang-update--id_transkrip-" data-method="PUT"
      data-path="api/transkripmagang/update/{id_transkrip}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-transkripmagang-update--id_transkrip-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-transkripmagang-update--id_transkrip-"
                    onclick="tryItOut('PUTapi-transkripmagang-update--id_transkrip-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-transkripmagang-update--id_transkrip-"
                    onclick="cancelTryOut('PUTapi-transkripmagang-update--id_transkrip-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-transkripmagang-update--id_transkrip-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/transkripmagang/update/{id_transkrip}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-transkripmagang-update--id_transkrip-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-transkripmagang-update--id_transkrip-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_transkrip</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_transkrip"                data-endpoint="PUTapi-transkripmagang-update--id_transkrip-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-transkripmagang-delete--id_transkrip-">DELETE api/transkripmagang/delete/{id_transkrip}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-transkripmagang-delete--id_transkrip-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/transkripmagang/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/transkripmagang/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-transkripmagang-delete--id_transkrip-">
</span>
<span id="execution-results-DELETEapi-transkripmagang-delete--id_transkrip-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-transkripmagang-delete--id_transkrip-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-transkripmagang-delete--id_transkrip-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-transkripmagang-delete--id_transkrip-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-transkripmagang-delete--id_transkrip-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-transkripmagang-delete--id_transkrip-" data-method="DELETE"
      data-path="api/transkripmagang/delete/{id_transkrip}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-transkripmagang-delete--id_transkrip-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-transkripmagang-delete--id_transkrip-"
                    onclick="tryItOut('DELETEapi-transkripmagang-delete--id_transkrip-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-transkripmagang-delete--id_transkrip-"
                    onclick="cancelTryOut('DELETEapi-transkripmagang-delete--id_transkrip-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-transkripmagang-delete--id_transkrip-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/transkripmagang/delete/{id_transkrip}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-transkripmagang-delete--id_transkrip-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-transkripmagang-delete--id_transkrip-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_transkrip</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_transkrip"                data-endpoint="DELETEapi-transkripmagang-delete--id_transkrip-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-usulankonversi">GET api/usulankonversi</h2>

<p>
</p>



<span id="example-requests-GETapi-usulankonversi">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/usulankonversi" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/usulankonversi"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-usulankonversi">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 39
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Tidak ada data logbook ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-usulankonversi" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-usulankonversi"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-usulankonversi"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-usulankonversi" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-usulankonversi">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-usulankonversi" data-method="GET"
      data-path="api/usulankonversi"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-usulankonversi', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-usulankonversi"
                    onclick="tryItOut('GETapi-usulankonversi');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-usulankonversi"
                    onclick="cancelTryOut('GETapi-usulankonversi');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-usulankonversi"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/usulankonversi</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-usulankonversi"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-usulankonversi"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-usulankonversi-store">POST api/usulankonversi/store</h2>

<p>
</p>



<span id="example-requests-POSTapi-usulankonversi-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/usulankonversi/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/usulankonversi/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-usulankonversi-store">
</span>
<span id="execution-results-POSTapi-usulankonversi-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-usulankonversi-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-usulankonversi-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-usulankonversi-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-usulankonversi-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-usulankonversi-store" data-method="POST"
      data-path="api/usulankonversi/store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-usulankonversi-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-usulankonversi-store"
                    onclick="tryItOut('POSTapi-usulankonversi-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-usulankonversi-store"
                    onclick="cancelTryOut('POSTapi-usulankonversi-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-usulankonversi-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/usulankonversi/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-usulankonversi-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-usulankonversi-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-usulankonversi--nim-">GET api/usulankonversi/{nim}</h2>

<p>
</p>



<span id="example-requests-GETapi-usulankonversi--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/usulankonversi/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/usulankonversi/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-usulankonversi--nim-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 38
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;UsulanKonversi dengan NIM 16 tidak ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-usulankonversi--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-usulankonversi--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-usulankonversi--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-usulankonversi--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-usulankonversi--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-usulankonversi--nim-" data-method="GET"
      data-path="api/usulankonversi/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-usulankonversi--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-usulankonversi--nim-"
                    onclick="tryItOut('GETapi-usulankonversi--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-usulankonversi--nim-"
                    onclick="cancelTryOut('GETapi-usulankonversi--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-usulankonversi--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/usulankonversi/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-usulankonversi--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-usulankonversi--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="nim"                data-endpoint="GETapi-usulankonversi--nim-"
               value="16"
               data-component="url">
    <br>
<p>Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-usulankonversi-update--nim-">PUT api/usulankonversi/update/{nim}</h2>

<p>
</p>



<span id="example-requests-PUTapi-usulankonversi-update--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/usulankonversi/update/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/usulankonversi/update/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-usulankonversi-update--nim-">
</span>
<span id="execution-results-PUTapi-usulankonversi-update--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-usulankonversi-update--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-usulankonversi-update--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-usulankonversi-update--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-usulankonversi-update--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-usulankonversi-update--nim-" data-method="PUT"
      data-path="api/usulankonversi/update/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-usulankonversi-update--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-usulankonversi-update--nim-"
                    onclick="tryItOut('PUTapi-usulankonversi-update--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-usulankonversi-update--nim-"
                    onclick="cancelTryOut('PUTapi-usulankonversi-update--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-usulankonversi-update--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/usulankonversi/update/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-usulankonversi-update--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-usulankonversi-update--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="PUTapi-usulankonversi-update--nim-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-usulankonversi-delete--nim-">DELETE api/usulankonversi/delete/{nim}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-usulankonversi-delete--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/usulankonversi/delete/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/usulankonversi/delete/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-usulankonversi-delete--nim-">
</span>
<span id="execution-results-DELETEapi-usulankonversi-delete--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-usulankonversi-delete--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-usulankonversi-delete--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-usulankonversi-delete--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-usulankonversi-delete--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-usulankonversi-delete--nim-" data-method="DELETE"
      data-path="api/usulankonversi/delete/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-usulankonversi-delete--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-usulankonversi-delete--nim-"
                    onclick="tryItOut('DELETEapi-usulankonversi-delete--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-usulankonversi-delete--nim-"
                    onclick="cancelTryOut('DELETEapi-usulankonversi-delete--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-usulankonversi-delete--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/usulankonversi/delete/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-usulankonversi-delete--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-usulankonversi-delete--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="DELETEapi-usulankonversi-delete--nim-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
