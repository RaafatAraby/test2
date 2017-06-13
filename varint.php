$count = $client->call("GET", "/admin/products/count.json");
if ($count > 0) {
    $pages = ceil($count / 250);
    for ($i=0; $i<$pages; $i++) {
        $products = $client->call("GET", "/admin/products.json?limit=250&&page=".($i+1));
        foreach ($products as $product) {
            // your processing here
        }
    }
}