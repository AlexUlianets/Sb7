<script src="/js/jquery.min.js"></script>
<link rel="stylesheet" href="/css/croppie.min.css" />
<script src="/js/croppie.min.js"></script>

<div class="padding">

  <img class="my-image" src="https://news.nationalgeographic.com/content/dam/news/2018/05/17/you-can-train-your-cat/02-cat-training-NationalGeographic_1484324.ngsversion.1526587209178.adapt.1900.1.jpg" />

</div>

<script>
$('.my-image').croppie({
  // url: 'https://news.nationalgeographic.com/content/dam/news/2018/05/17/you-can-train-your-cat/02-cat-training-NationalGeographic_1484324.ngsversion.1526587209178.adapt.1900.1.jpg',
  viewport: {
    width: 200,
    height: 200,
    type: 'circle'
  },
  boundary: {
    width: 300,
    height: 300
  }
});
</script>