
while true
do
echo 1 > /sys/class/gpio/gpio25/value
echo 0 > /sys/class/gpio/gpio24/value
sleep 0.01
echo 1 > /sys/class/gpio/gpio24/value
echo 0 > /sys/class/gpio/gpio16/value
sleep 0.01
echo 1 > /sys/class/gpio/gpio16/value
echo 0 > /sys/class/gpio/gpio20/value
sleep 0.01
echo 1 > /sys/class/gpio/gpio20/value
echo 0 > /sys/class/gpio/gpio26/value
sleep 0.01
echo 0 > /sys/class/gpio/gpio25/value
echo 1 > /sys/class/gpio/gpio21/value
sleep 0.01
echo 0 > /sys/class/gpio/gpio21/value
echo 1 > /sys/class/gpio/gpio13/value
sleep 0.01
echo 0 > /sys/class/gpio/gpio13/value
echo 1 > /sys/class/gpio/gpio5/value
sleep 0.01
echo 1 > /sys/class/gpio/gpio26/value
echo 0 > /sys/class/gpio/gpio20/value
sleep 0.01
echo 1 > /sys/class/gpio/gpio20/value
echo 0 > /sys/class/gpio/gpio16/value
sleep 0.01
echo 1 > /sys/class/gpio/gpio16/value
echo 0 > /sys/class/gpio/gpio24/value
sleep 0.01
echo 0 > /sys/class/gpio/gpio5/value
echo 1 > /sys/class/gpio/gpio22/value
sleep 0.0
echo 0 > /sys/class/gpio/gpio22/value
echo 1 > /sys/class/gpio/gpio12/value
sleep 0.01
echo 0 > /sys/class/gpio/gpio12/value
done

echo 1 > /sys/class/gpio/gpio26/value
echo 1 > /sys/class/gpio/gpio20/value
echo 1 > /sys/class/gpio/gpio16/value
echo 1 > /sys/class/gpio/gpio24/value
echo 0 > /sys/class/gpio/gpio22/value
echo 0 > /sys/class/gpio/gpio5/value
echo 0 > /sys/class/gpio/gpio6/value
echo 0 > /sys/class/gpio/gpio13/value
echo 0 > /sys/class/gpio/gpio19/value
echo 0 > /sys/class/gpio/gpio21/value
echo 0 > /sys/class/gpio/gpio12/value
echo 0 > /sys/class/gpio/gpio25/value

echo 0 > /sys/class/gpio/gpio26/value
echo 0 > /sys/class/gpio/gpio20/value
echo 0 > /sys/class/gpio/gpio16/value
echo 0 > /sys/class/gpio/gpio24/value
