#!/use/bin/env bash

for i in `seq 1 1200`;
do 
	phantomjs scrape.js "http://website.com/#page="$i > pages/pages_$i.txt
	delay=$(python -c "import random;print(random.uniform(61.0, 65.0))")
	sleep $delay
done