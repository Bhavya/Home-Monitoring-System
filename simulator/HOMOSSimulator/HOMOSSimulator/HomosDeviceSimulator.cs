using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Net;
using System.IO;

namespace WindowsFormsApplication1
{
    public partial class Form1 : Form
    {
        private bool systemEnable = false;

        private bool lightsKitchen = false;
        private bool lightsLivingroom = false;
        private bool lightsStudy = false;
        private bool lightsFloodlights = false;
        private bool lightsBedroom = false;
        private bool lightsGuestroom = false;

        private int sensorKitchenLight = 0;
        private int sensorKitchenDoor = 0;
        private int sensorBedroomLight = 0;
        private int sensorBedroomDoor = 0;
        private int sensorStudyLight = 0;
        private int sensorGuestLight = 0;
        private int sensorGuestDoor = 0;
        private int sensorStudyDoor = 0;
        private int sensorLivingroomLight = 0;
        private int sensorLivingroomDoor = 0;
        private int sensorGarageDoor = 0;
        private int sensorFloodlight = 0;
        private int sensorMotion = 0;

        private bool sendTemp = true;


        public Form1()
        {
            InitializeComponent();
            timer1.Tick += new EventHandler(timer1_Tick); // Everytime timer ticks, timer_Tick will be called
            timer1.Interval = (1000) * (120);              // Timer will tick evert second
            timer1.Enabled = true;                       // Enable the timer
            timer1.Start();        
        }

        private void btnLightsKitchen_Click(object sender, EventArgs e)
        {
            if (!lightsKitchen)
            {
                btnLightsKitchen.BackColor = System.Drawing.Color.Yellow;
                btnLightsKitchen.Text = "Lights (on)";
                enableWebRequest("update=lights&place=Kitchen&state=1&id=" + houseID.Text);
            }
            else
            {
                btnLightsKitchen.BackColor = SystemColors.Control;
                btnLightsKitchen.Text = "Lights";
                enableWebRequest("update=lights&place=Kitchen&state=0&id=" + houseID.Text);
            }
            lightsKitchen = !lightsKitchen;
            sensorKitchenLight++;
            if (sensorKitchenLight % 10 == 9)
            {
                sensorKitchenLight = 0;
                lowBattery("KitchenLight");
            }
        }

        private void btnLightsLivingroom_Click(object sender, EventArgs e)
        {
            if (!lightsLivingroom)
            {
                btnLightsLivingroom.BackColor = System.Drawing.Color.Yellow;
                btnLightsLivingroom.Text = "Lights (on)";
                enableWebRequest("update=lights&place=Livingroom&state=1&id=" + houseID.Text);
            }
            else
            {
                btnLightsLivingroom.BackColor = SystemColors.Control;
                btnLightsLivingroom.Text = "Lights";
                enableWebRequest("update=lights&place=Livingroom&state=0&id=" + houseID.Text);
            }
            lightsLivingroom = !lightsLivingroom;
            sensorLivingroomLight++;
            if (sensorLivingroomLight % 10 == 9)
            {
                sensorLivingroomLight = 0;
                lowBattery("LivingroomLight");
            }
        }

        private void btnLightsStudy_Click(object sender, EventArgs e)
        {
            if (!lightsStudy)
            {
                btnLightsStudy.BackColor = System.Drawing.Color.Yellow;
                btnLightsStudy.Text = "Lights (on)";
                enableWebRequest("update=lights&place=Study&state=1&id=" + houseID.Text);
            }
            else
            {
                btnLightsStudy.BackColor = SystemColors.Control;
                btnLightsStudy.Text = "Lights";
                enableWebRequest("update=lights&place=Study&state=0&id=" + houseID.Text);
            }
            lightsStudy = !lightsStudy;
            sensorStudyLight++;
            sensorStudyLight++;
            if (sensorStudyLight % 10 == 9)
            {
                sensorStudyLight = 0;
                lowBattery("StudyLight");
            }
        }

        private void btnFloodlights_Click(object sender, EventArgs e)
        {
            if (!lightsFloodlights)
            {
                btnFloodlights.BackColor = System.Drawing.Color.Yellow;
                btnFloodlights.Text = "Floodlights (on)";
                enableWebRequest("update=floodlight&id=" + houseID.Text);
            }
            else
            {
                btnFloodlights.BackColor = SystemColors.Control;
                btnFloodlights.Text = "Floodlights";
            }
            lightsFloodlights = !lightsFloodlights;
            sensorFloodlight++;
            if (sensorFloodlight % 10 == 9)
            {
                sensorFloodlight = 0;
                lowBattery("Floodight");
            }
        }

        private void btnBedroom_Click(object sender, EventArgs e)
        {
            if (!lightsBedroom)
            {
                btnBedroom.BackColor = System.Drawing.Color.Yellow;
                btnBedroom.Text = "Lights (on)";
                enableWebRequest("update=lights&place=Bedroom&state=1&id=" + houseID.Text);
            }
            else
            {
                btnBedroom.BackColor = SystemColors.Control;
                btnBedroom.Text = "Lights";
                enableWebRequest("update=lights&place=Bedroom&state=0&id=" + houseID.Text);
            }
            lightsBedroom = !lightsBedroom;
            sensorBedroomLight++;
            if (sensorBedroomLight % 10 == 9)
            {
                sensorBedroomLight = 0;
                lowBattery("BedroomLight");
            }
        }

        private void btnGuestroom_Click(object sender, EventArgs e)
        {
            if (!lightsGuestroom)
            {
                btnGuestroom.BackColor = System.Drawing.Color.Yellow;
                btnGuestroom.Text = "Lights (on)";
                enableWebRequest("update=lights&place=Guestroom&state=1&id=" + houseID.Text);
            }
            else
            {
                btnGuestroom.BackColor = SystemColors.Control;
                btnGuestroom.Text = "Lights";
                enableWebRequest("update=lights&place=Guestroom&state=0&id=" + houseID.Text);
            }
            lightsGuestroom = !lightsGuestroom;
            sensorGuestLight++;
            if (sensorGuestLight % 10 == 9)
            {
                sensorGuestLight = 0;
                lowBattery("GuestroomLight");
            }
        }

        private void enableWebRequest(string postVars) {
            try
            {
                WebClient client = new WebClient();
                client.Headers["User-Agent"] = "Mozilla/4.0 (Compatible; Windows NT 5.1; MSIE 6.0)" +  " (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)";

                // Download data.
                byte[] arr = client.DownloadData("http://homos.karmabubble.com/ajax.php?"+ postVars);

                // Write values.
                Console.WriteLine("--- WebClient result ---");
                Console.WriteLine(arr.Length);
            }
            catch (Exception e)
            {
                MessageBox.Show(e.Message);
            }
        }

        private void lowBattery(string sensor)
        {
            string msg = sensor + " is low on battery and will now be using your power grid to recharge itself. Once charged, it will resume using its own battery.";
            MessageBox.Show(msg);
            enableWebRequest("update=lowbatt&device="+sensor+"&state=1&id=" + houseID.Text);
        }

        private void btnSystemEnable_Click(object sender, EventArgs e)
        {
            if (houseID.Text.Equals(""))
            {
                MessageBox.Show("Please enter your House Id");
            }
            else
            {
                if (!systemEnable)
                {
                    houseID.Enabled = false;
                    enableWebRequest("type=onoff&state=1&id=" + houseID.Text);
                    btnSystemEnable.Text = "Disable";
                }
                else
                {
                    houseID.Enabled = true;
                    enableWebRequest("type=onoff&state=0&id="+houseID.Text);
                    btnSystemEnable.Text = "Enable";
                }
                systemEnable = !systemEnable;
            }
        }

        private void btnGarageDoor_Click(object sender, EventArgs e)
        {
            if (systemEnable)
            {
                enableWebRequest("update=door&place=Garage&id=" + houseID.Text);
            }
            else
            {
                MessageBox.Show("Please ensure the system is enabled");
            }
            sensorGarageDoor++;
            if (sensorGarageDoor % 10 == 9)
            {
                sensorGarageDoor = 0;
                lowBattery("GarageDoor");
            }
        }

        private void btnMovement_Click(object sender, EventArgs e)
        {
            if (systemEnable)
            {
                enableWebRequest("update=motion&id=" + houseID.Text);
            }
            else
            {
                MessageBox.Show("Please ensure the system is enabled");
            }
            sensorMotion++;
            if (sensorMotion % 10 == 9)
            {
                sensorMotion = 0;
                lowBattery("MotionDetection");
            }
        }

        private void btnKitchenDoor_Click(object sender, EventArgs e)
        {
            if (systemEnable)
            {
                enableWebRequest("update=door&place=Back&id=" + houseID.Text);
            }
            else
            {
                MessageBox.Show("Please ensure the system is enabled");
            }
            sensorKitchenDoor++;
            if (sensorKitchenDoor % 10 == 9)
            {
                sensorKitchenDoor = 0;
                lowBattery("BackDoor");
            }
        }

        private void btnFrontDoor_Click(object sender, EventArgs e)
        {
            if (systemEnable)
            {
                enableWebRequest("update=door&place=Front&id=" + houseID.Text);
            }
            else
            {
                MessageBox.Show("Please ensure the system is enabled");
            }
            sensorLivingroomDoor++;
            if (sensorLivingroomDoor % 10 == 9)
            {
                sensorLivingroomDoor = 0;
                lowBattery("FrontDoor");
            }
        }

        private void btnStudyDoor_Click(object sender, EventArgs e)
        {
            if (systemEnable)
            {
                enableWebRequest("update=door&place=Study&id=" + houseID.Text);
            }
            else
            {
                MessageBox.Show("Please ensure the system is enabled");
            }
            sensorStudyDoor++;
            if (sensorStudyDoor % 10 == 9)
            {
                sensorStudyDoor = 0;
                lowBattery("StudyDoor");
            }
        }

        private void btnBedroomDoor_Click(object sender, EventArgs e)
        {
            if (systemEnable)
            {
                enableWebRequest("update=door&place=Bedroom&id=" + houseID.Text);
            }
            else
            {
                MessageBox.Show("Please ensure the system is enabled");
            }
            sensorBedroomDoor++;
            if (sensorBedroomDoor % 10 == 9)
            {
                sensorBedroomDoor = 0;
                lowBattery("BedroomDoor");
            }
        }

        private void btnGuestDoor_Click(object sender, EventArgs e)
        {
            if (systemEnable)
            {
                enableWebRequest("update=door&place=Guestroom&id=" + houseID.Text);
            }
            else
            {
                MessageBox.Show("Please ensure the system is enabled");
            }
            sensorGuestDoor++;
            if (sensorGuestDoor % 10 == 9)
            {
                sensorGuestDoor = 0;
                lowBattery("GuestroomDoor");
            }
        }

        private void breakin_Click(object sender, EventArgs e)
        {
            if (systemEnable)
            {
                enableWebRequest("update=breakin&id=" + houseID.Text);
            }
            else
            {
                MessageBox.Show("Please ensure the system is enabled");
            }
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            if (systemEnable && sendTemp)
            {
                Random random = new Random();
                var output = new StringBuilder();
                output.Append(random.Next(19, 23));
                temperature.Text = output.ToString();
                enableWebRequest("update=temperature&temp="+temperature.Text+"&id=" + houseID.Text);
            }
        }

        private void thermostat_Click(object sender, EventArgs e)
        {
            if (systemEnable)
            {
                Random random = new Random();
                var output = new StringBuilder();
                output.Append(random.Next(19, 23));
                temperature.Text = output.ToString();
                enableWebRequest("update=temperature&temp=" + temperature.Text + "&id=" + houseID.Text);
            }
            else
            {
                MessageBox.Show("Please ensure the system is enabled");
            }
        }

        private void onoff_Click(object sender, EventArgs e)
        {
            sendTemp = !sendTemp;
            onoff.Text = (sendTemp) ? "off" : "on";
        }

    }
}
