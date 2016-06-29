 <?php 
echo 
'<div class="docs-content">
  <h2> Getting Started</h2>
  <h3 id="welcome"> Welcome
  </h3>

  <p> RESTFUL API for social media<br>
    Find out more about Restserver in Codeigniter<br>
    http://github.com/chriskacerguis/codeigniter-restserver<br>
    Codeigniter 3.0.6

    Access Point: mfikria.com/api/socmed/
  </p>

  <h3 id="view_type">API: sosmedusers/posts</h3>
  <ul class="get">
    <li id="get_sosmedusers_posts"><strong>[GET]</strong> /sosmedusers/posts</li>
  </ul>
  Melakukan list semua data post yang ada pada basis data.<br>

  <h4>Contoh Respon: <i>200</i></h4>
  <pre class="prettyprint">
[
  {
    "id": "1",
    "sosmeduserid": "1",
    "date": "2016-06-01",
    "text": "test"
  },
  {
    "id": "2",
    "sosmeduserid": "1",
    "date": "2016-06-01",
    "text": "Harus diakui kinerja industri minyak sawit sebenarnya memang bagus. Kontribusinya terhadap pendapatan negara dalam Anggaran Pendapatan dan Belanja Negara konkret dan meningkat dari"
  },
  {
    "id": "3",
    "sosmeduserid": "2",
    "date": "2016-06-02",
    "text": "Menteri Pendidikan dan Kebudayaan Anies Baswedan meluncurkan program  Guru Pembelajar di Jakarta, 21 Mei 2016. Hal itu merupakan buntut kelanjutan dari tes kompetensi  yang.."
  },
  {
    "id": "5",
    "sosmeduserid": "4",
    "date": "2016-05-19",
    "text": "Kawasan Laut Tiongkok Selatan bisa menjadi ajang perdebatan diplomatik yang sengit pada masa mendatang. Bahkan, seorang analis Australia mengatakan konflik Laut Tiongkok Selatan bisa memicu perang dunia habis-habisan dan melibatkan banyak negara. Laut Tiongkok Selatan dengan luas 1,5 juta mil.."
  }
]
</pre>


<ul class="get">
  <li id="get_sosmedusers_posts_postid"><strong>[GET]</strong> /sosmedusers/posts/{postId}</li>
</ul>
Melakukan list semua data post dari user tertentu berdasarkan User ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">

    <tr><td class="code"><label>Post ID</label></td>
      <td class="markdown">Nomor identifikasi post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Respon: <i>200</i></h4>
  <pre class="prettyprint">
[
  {
    "id": "2",
    "sosmeduserid": "1",
    "date": "2016-06-01",
    "text": "Harus diakui kinerja industri minyak sawit sebenarnya memang bagus. Kontribusinya terhadap pendapatan negara dalam Anggaran Pendapatan dan Belanja Negara konkret dan meningkat dari"
  }
]
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "No post was found"
}
</pre>
<br>
<h3 id="view_type">API: sosmedusers</h3>

<ul class="get">
  <li id="get_sosmedusers"><strong>[GET]</strong> /sosmedusers</li>
</ul>
Melakukan list semua data user yang ada pada basis data.<br>

<h4>Contoh Respon: <i>200</i></h4>
<pre class="prettyprint">
  [
  {
    "id": "13",
    "email": "akhfa@a.com",
    "password": "akhfa",
    "name": "akhfa",
    "address": "jalan X kel. Y",
    "telp": "08123456789"
  },
  {
    "id": "1",
    "email": "vincent_theophilusc@yahoo.com",
    "password": "user123",
    "name": "Vincent Theophilus Ciputra",
    "address": "Jln Batununggal Mulia Iii No. 2A",
    "telp": "087717913118"
  },
  {
    "id": "15",
    "email": "a1@a.com",
    "password": "a",
    "name": "name1",
    "address": "jalan abc",
    "telp": "0822222222"
  },
  {
    "id": "3",
    "email": "jonathan.benedict@students.itb.ac.id",
    "password": "user123",
    "name": "Jonathan Benedict",
    "address": "Puri Kencana K10/25",
    "telp": "087879927818"
  }
]
</pre>

<ul class="post">
  <li id="post_sosmedusers"><strong>[POST]</strong> /sosmedusers</li>
</ul>
Membuat user baru pada sistem.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">

    <tr><td class="code"><label>User Data</label></td>
      <td class="markdown">Data User baru berupa JSON String
      </td>
      <td>Query</td>
      <td>
        <span class="model-signature">JSON</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Query Input</h4>
  <pre class="prettyprint">
{
  "email": "mfikria@gmail.com",
  "password": "Muhamad Fikri",
  "name": "Fikri",
  "address": "jalan ABC",
  "telp": "089786682617"
}
</pre>

<h4>Contoh Respon: <i>200</i></h4>
<pre class="prettyprint">
{
  "email": "mfikria@gmail.com",
  "password": "Muhamad Fikri",
  "name": "Fikri",
  "address": "jalan ABC",
  "telp": "089786682617",
  "id": 16
}
</pre>

<ul class="delete">
  <li id="delete_sosmedusers_userid"><strong>[DELETE]</strong> /sosmedusers/{userId}}</li>
</ul>

Menghapus data user pada basis data berdasarkan User ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">

    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Respon: <i>200</i></h4>
  <pre class="prettyprint">
{
  "status": true,
  "message": 3
}
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "User was not found"
}
</pre>

<ul class="get">
  <li id="get_sosmedusers_userid"><strong>[GET]</strong> /sosmedusers/{userId}</li>
</ul>
Mengambil data user tertentu berdasarkan User ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">

    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Respon: <i>200</i></h4>
  <pre class="prettyprint">
[
  {
    "id": "5",
    "email": "muhammad_ridwan@students.itb.ac.id",
    "password": "user123",
    "name": "Muhammad Ridwan",
    "address": "Jl. Kalipasir Gg. Tembok no.15 Jakarta Pusat",
    "telp": "087879902748"
  }
]
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "User was not found"
}
</pre>
<ul class="put">
  <li id="put_sosmedusers_userid"><strong>[PUT]</strong> /sosmedusers/{userId}</li>
</ul>
Memperbaharui user data tertentu berdasarkan User ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">
    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr>
    <tr><td class="code"><label>User Data</label></td>
      <td class="markdown">Data User baru berupa JSON String
      </td>
      <td>Query</td>
      <td>
        <span class="model-signature">JSON</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Query Input</h4>
  <pre class="prettyprint">
{
  "email": "mfikria@gmail.com",
  "password": "Muhamad Fikri",
  "name": "Fikri",
  "address": "jalan ABC",
  "telp": "089786682617"
}
</pre>

<h4>Contoh Respon: <i>200</i></h4>
<pre class="prettyprint">
{
  "email": "mfikria@gmail.com",
  "password": "Muhamad Fikri",
  "name": "Fikri",
  "address": "jalan ABC",
  "telp": "089786682617",
  "id": 16
}
</pre>

<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "User was not found"
}
</pre>

<ul class="get">
  <li id="get_sosmedusers_userid_exists"><strong>[GET]</strong> /sosmedusers/{userId}/exists</li>
</ul>
Mengecek keberadaan user tertentu berdasarkan User ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">

    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Respon: <i>200</i></h4>
  <pre class="prettyprint">
    {
    "exists": true
  }
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
  {
  "exists": false
}
</pre>

<ul class="delete">
  <li id="delete_sosmedusers_userid_posts"><strong>[DELETE]</strong> /sosmedusers/{userId}/posts</li>
</ul>
Menghapus semua post dari user tertentu berdasarkan User ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">

    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Respon: <i>200</i></h4>
  <pre class="prettyprint">
{
  "status": true,
  "message": "Deleting post success"
}
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "User was not found"
}
</pre>

<ul class="get">
  <li id="get_sosmedusers_userid_posts"><strong>[GET]</strong> /sosmedusers/{userId}/posts</li>
</ul>
Mendapatkan semua post dari user tertentu berdasarkan User ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">

    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Respon: <i>200</i></h4>
  <pre class="prettyprint">
[
  {
    "id": "1",
    "sosmeduserid": "1",
    "date": "2016-06-01",
    "text": "test"
  },
  {
    "id": "2",
    "sosmeduserid": "1",
    "date": "2016-06-01",
    "text": "Harus diakui kinerja industri minyak sawit sebenarnya memang bagus. Kontribusinya terhadap pendapatan negara dalam Anggaran Pendapatan dan Belanja Negara konkret dan meningkat dari"
  }
]
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "User was not found"
}
</pre>

<ul class="post">
  <li id="post_sosmedusers_userid_posts"><strong>[POST]</strong> /sosmedusers/{userId}/posts</li>
</ul>
Membuat post baru dari user tertentu berdasarkan User ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">
    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr>
    <tr><td class="code"><label>Post Data</label></td>
      <td class="markdown">Data Post baru berupa JSON String
      </td>
      <td>Query</td>
      <td>
        <span class="model-signature">JSON</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Query Input</h4>
  <pre class="prettyprint">
{
  "date": "2016-05-07",
  "text": "ini isi dari posting barudari user 1"
}
</pre>

<h4>Contoh Respon: <i>200</i></h4>
<pre class="prettyprint">
{
  "date": "2016-05-07",
  "text": "ini isi dari posting barudari user 1",
  "sosmeduserid": "1",
  "id": 10
}
</pre>

<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "User was not found"
}
</pre>

<ul class="delete">
  <li id="delete_sosmedusers_userid_posts_postid"><strong>[DELETE]</strong> /sosmedusers/{userId}/posts/{postId}</li>
</ul>
Menghapus post tertentu dari user tertentu berdasarkan User ID dan Post ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">

    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr>
    <tr><td class="code"><label>Post ID</label></td>
      <td class="markdown">Nomor identifikasi post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Respon: <i>200</i></h4>
  <pre class="prettyprint">
{
  "status": true,
  "message": "Deleting post success"
}
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "User was not found"
}
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "Post was not found"
}
</pre>

<ul class="get">
  <li id="get_sosmedusers_userid_posts_postid"><strong>[GET]</strong> /sosmedusers/{userId}/posts/{postId}</li>
</ul>
Mendapatkan post tertentu dari user tertentu berdasarkan User ID dan Post ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">

    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr>
    <tr><td class="code"><label>Post ID</label></td>
      <td class="markdown">Nomor identifikasi post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Respon: <i>200</i></h4>
  <pre class="prettyprint">
[
  {
    "id": "2",
    "sosmeduserid": "1",
    "date": "2016-06-01",
    "text": "Harus diakui kinerja industri minyak sawit sebenarnya memang bagus. Kontribusinya terhadap pendapatan negara dalam Anggaran Pendapatan dan Belanja Negara konkret dan meningkat dari"
  }
]
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "User was not found"
}
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "Post was not found"
}
</pre>

<ul class="put">
  <li id="put_sosmedusers_userid_posts_postid"><strong>[PUT]</strong> /sosmedusers/{userId}/posts/{postId}</li>
</ul>
Memperbaharui post tertentu dari user tertentu berdasarkan User ID dan Post ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">
    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr>
    <tr><td class="code"><label>Post ID</label></td>
      <td class="markdown">Nomor identifikasi post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr>
    <tr><td class="code"><label>Post Data</label></td>
      <td class="markdown">Data Post baru berupa JSON String
      </td>
      <td>Query</td>
      <td>
        <span class="model-signature">JSON</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Query Input</h4>
  <pre class="prettyprint">
{
  "date": "2016-05-07",
  "text": "ini isi dari posting baru dari user id 1 dan post id 10"
}
</pre>

<h4>Contoh Respon: <i>200</i></h4>
<pre class="prettyprint">
{
  "date": "2016-05-07",
  "text": "ini isi dari posting baru dari user id 1 dan post id 10",
  "sosmeduserid": "1",
  "id": 10
}
</pre>

<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "User was not found"
}
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "Post was not found"
}
</pre>

<ul class="get">
  <li id="get_sosmedusers_userid_posts_count"><strong>[GET]</strong> /sosmedusers/{userId}/posts/count</li>
</ul>
Mengambil jumlah total post dari user tertentu berdasarkan User ID.<br>
<h4>Parameter Input</h4>

<table class="main-table">
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Description</th>
      <th>Parameter Type</th>
      <th>Data Type</th>
    </tr>
  </thead>
  <tbody class="operation-params">

    <tr><td class="code"><label>User ID</label></td>
      <td class="markdown">User ID yang memiliki post
      </td>
      <td>Path</td>
      <td>
        <span class="model-signature">Integer</span>
      </td>
    </tr></tbody>
  </table>

  <h4>Contoh Respon: <i>200</i></h4>
  <pre class="prettyprint">
{
  "count": 3
}
</pre>
<h4>Contoh Respon: <i>404</i></h4>
<pre class="prettyprint">
{
  "status": false,
  "message": "User was not found"
}
</pre>

<ul class="get">
  <li id="get_sosmedusers_count"><strong>[GET]</strong> /sosmedusers/count</li>
</ul>
Mengambil jumlah total user yang ada dalam basis data.<br>

<h4>Contoh Respon: <i>200</i></h4>
<pre class="prettyprint">
{
  "count": 6
}
</pre>
</div>';
?>