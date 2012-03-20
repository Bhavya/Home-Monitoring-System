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
using System.Text;

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

        public Form1()
        {
            InitializeComponent();
        }

        private void btnLightsKitchen_Click(object sender, EventArgs e)
        {
            if (!lightsKitchen)
            {
                btnLightsKitchen.BackColor = System.Drawing.Color.Yellow;
                btnLightsKitchen.Text = "Lights (on)";
            }
            else
            {
                btnLightsKitchen.BackColor = SystemColors.Control;
                btnLightsKitchen.Text = "Lights";
            }
            lightsKitchen = !lightsKitchen;
        }

        private void btnLightsLivingroom_Click(object sender, EventArgs e)
        {
            if (!lightsLivingroom)
            {
                btnLightsLivingroom.BackColor = System.Drawing.Color.Yellow;
                btnLightsLivingroom.Text = "Lights (on)";
            }
            else
            {
                btnLightsLivingroom.BackColor = SystemColors.Control;
                btnLightsLivingroom.Text = "Lights";
            }
            lightsLivingroom = !lightsLivingroom;
        }

        private void btnLightsStudy_Click(object sender, EventArgs e)
        {
            if (!lightsStudy)
            {
                btnLightsStudy.BackColor = System.Drawing.Color.Yellow;
                btnLightsStudy.Text = "Lights (on)";
            }
            else
            {
                btnLightsStudy.BackColor = SystemColors.Control;
                btnLightsStudy.Text = "Lights";
            }
            lightsStudy = !lightsStudy;
        }

        private void btnFloodlights_Click(object sender, EventArgs e)
        {
            if (!lightsFloodlights)
            {
                btnFloodlights.BackColor = System.Drawing.Color.Yellow;
                btnFloodlights.Text = "Floodlights (on)";
            }
            else
            {
                btnFloodlights.BackColor = SystemColors.Control;
                btnFloodlights.Text = "Floodlights";
            }
            lightsFloodlights = !lightsFloodlights;
        }

        private void btnBedroom_Click(object sender, EventArgs e)
        {
            if (!lightsBedroom)
            {
                btnBedroom.BackColor = System.Drawing.Color.Yellow;
                btnBedroom.Text = "Lights (on)";
            }
            else
            {
                btnBedroom.BackColor = SystemColors.Control;
                btnBedroom.Text = "Lights";
            }
            lightsBedroom = !lightsBedroom;
        }

        private void btnGuestroom_Click(object sender, EventArgs e)
        {
            if (!lightsGuestroom)
            {
                btnGuestroom.BackColor = System.Drawing.Color.Yellow;
                btnGuestroom.Text = "Lights (on)";
            }
            else
            {
                btnGuestroom.BackColor = SystemColors.Control;
                btnGuestroom.Text = "Lights";
            }
            lightsGuestroom = !lightsGuestroom;
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
    }
}
