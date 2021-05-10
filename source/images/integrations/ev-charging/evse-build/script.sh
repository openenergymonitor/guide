for f in *.png; do 
    mv -- "$f" "${f%.jpg}.jpg"
done
