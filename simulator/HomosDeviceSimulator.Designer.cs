namespace WindowsFormsApplication1
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.statusStrip1 = new System.Windows.Forms.StatusStrip();
            this.houseID = new System.Windows.Forms.TextBox();
            this.houseIDLabel = new System.Windows.Forms.Label();
            this.btnSystemEnable = new System.Windows.Forms.Button();
            this.outside = new System.Windows.Forms.GroupBox();
            this.groupBox2 = new System.Windows.Forms.GroupBox();
            this.groupBox3 = new System.Windows.Forms.GroupBox();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.groupBox4 = new System.Windows.Forms.GroupBox();
            this.groupBox5 = new System.Windows.Forms.GroupBox();
            this.btnLightsKitchen = new System.Windows.Forms.Button();
            this.btnLightsLivingroom = new System.Windows.Forms.Button();
            this.btnLightsStudy = new System.Windows.Forms.Button();
            this.btnBedroom = new System.Windows.Forms.Button();
            this.btnGuestroom = new System.Windows.Forms.Button();
            this.btnFloodlights = new System.Windows.Forms.Button();
            this.outside.SuspendLayout();
            this.groupBox2.SuspendLayout();
            this.groupBox3.SuspendLayout();
            this.groupBox1.SuspendLayout();
            this.groupBox4.SuspendLayout();
            this.groupBox5.SuspendLayout();
            this.SuspendLayout();
            // 
            // statusStrip1
            // 
            this.statusStrip1.Location = new System.Drawing.Point(0, 446);
            this.statusStrip1.Name = "statusStrip1";
            this.statusStrip1.Size = new System.Drawing.Size(836, 22);
            this.statusStrip1.TabIndex = 0;
            this.statusStrip1.Text = "statusStrip1";
            // 
            // houseID
            // 
            this.houseID.Location = new System.Drawing.Point(70, 11);
            this.houseID.Name = "houseID";
            this.houseID.Size = new System.Drawing.Size(112, 20);
            this.houseID.TabIndex = 1;
            // 
            // houseIDLabel
            // 
            this.houseIDLabel.AutoSize = true;
            this.houseIDLabel.Location = new System.Drawing.Point(12, 15);
            this.houseIDLabel.Name = "houseIDLabel";
            this.houseIDLabel.Size = new System.Drawing.Size(52, 13);
            this.houseIDLabel.TabIndex = 2;
            this.houseIDLabel.Text = "House ID";
            // 
            // btnSystemEnable
            // 
            this.btnSystemEnable.Location = new System.Drawing.Point(188, 10);
            this.btnSystemEnable.Name = "btnSystemEnable";
            this.btnSystemEnable.Size = new System.Drawing.Size(75, 23);
            this.btnSystemEnable.TabIndex = 3;
            this.btnSystemEnable.Text = "Enable";
            this.btnSystemEnable.UseVisualStyleBackColor = true;
            // 
            // outside
            // 
            this.outside.Controls.Add(this.btnFloodlights);
            this.outside.Location = new System.Drawing.Point(15, 49);
            this.outside.Name = "outside";
            this.outside.Size = new System.Drawing.Size(357, 65);
            this.outside.TabIndex = 4;
            this.outside.TabStop = false;
            this.outside.Text = "Outside";
            // 
            // groupBox2
            // 
            this.groupBox2.Controls.Add(this.btnLightsKitchen);
            this.groupBox2.Location = new System.Drawing.Point(15, 120);
            this.groupBox2.Name = "groupBox2";
            this.groupBox2.Size = new System.Drawing.Size(357, 156);
            this.groupBox2.TabIndex = 5;
            this.groupBox2.TabStop = false;
            this.groupBox2.Text = "Kitchen";
            // 
            // groupBox3
            // 
            this.groupBox3.Controls.Add(this.btnLightsLivingroom);
            this.groupBox3.Location = new System.Drawing.Point(378, 120);
            this.groupBox3.Name = "groupBox3";
            this.groupBox3.Size = new System.Drawing.Size(447, 156);
            this.groupBox3.TabIndex = 6;
            this.groupBox3.TabStop = false;
            this.groupBox3.Text = "Livingroom";
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.btnLightsStudy);
            this.groupBox1.Location = new System.Drawing.Point(15, 282);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(357, 156);
            this.groupBox1.TabIndex = 7;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Study";
            // 
            // groupBox4
            // 
            this.groupBox4.Controls.Add(this.btnBedroom);
            this.groupBox4.Location = new System.Drawing.Point(378, 282);
            this.groupBox4.Name = "groupBox4";
            this.groupBox4.Size = new System.Drawing.Size(223, 156);
            this.groupBox4.TabIndex = 8;
            this.groupBox4.TabStop = false;
            this.groupBox4.Text = "Bedroom";
            // 
            // groupBox5
            // 
            this.groupBox5.Controls.Add(this.btnGuestroom);
            this.groupBox5.Location = new System.Drawing.Point(607, 282);
            this.groupBox5.Name = "groupBox5";
            this.groupBox5.Size = new System.Drawing.Size(218, 156);
            this.groupBox5.TabIndex = 9;
            this.groupBox5.TabStop = false;
            this.groupBox5.Text = "Guest Room";
            // 
            // btnLightsKitchen
            // 
            this.btnLightsKitchen.BackColor = System.Drawing.SystemColors.Control;
            this.btnLightsKitchen.Location = new System.Drawing.Point(21, 19);
            this.btnLightsKitchen.Name = "btnLightsKitchen";
            this.btnLightsKitchen.Size = new System.Drawing.Size(123, 40);
            this.btnLightsKitchen.TabIndex = 0;
            this.btnLightsKitchen.Text = "Lights";
            this.btnLightsKitchen.UseVisualStyleBackColor = false;
            this.btnLightsKitchen.Click += new System.EventHandler(this.btnLightsKitchen_Click);
            // 
            // btnLightsLivingroom
            // 
            this.btnLightsLivingroom.BackColor = System.Drawing.SystemColors.Control;
            this.btnLightsLivingroom.Location = new System.Drawing.Point(17, 19);
            this.btnLightsLivingroom.Name = "btnLightsLivingroom";
            this.btnLightsLivingroom.Size = new System.Drawing.Size(123, 40);
            this.btnLightsLivingroom.TabIndex = 10;
            this.btnLightsLivingroom.Text = "Lights";
            this.btnLightsLivingroom.UseVisualStyleBackColor = false;
            this.btnLightsLivingroom.Click += new System.EventHandler(this.btnLightsLivingroom_Click);
            // 
            // btnLightsStudy
            // 
            this.btnLightsStudy.BackColor = System.Drawing.SystemColors.Control;
            this.btnLightsStudy.Location = new System.Drawing.Point(21, 36);
            this.btnLightsStudy.Name = "btnLightsStudy";
            this.btnLightsStudy.Size = new System.Drawing.Size(123, 40);
            this.btnLightsStudy.TabIndex = 11;
            this.btnLightsStudy.Text = "Lights";
            this.btnLightsStudy.UseVisualStyleBackColor = false;
            this.btnLightsStudy.Click += new System.EventHandler(this.btnLightsStudy_Click);
            // 
            // btnBedroom
            // 
            this.btnBedroom.BackColor = System.Drawing.SystemColors.Control;
            this.btnBedroom.Location = new System.Drawing.Point(17, 36);
            this.btnBedroom.Name = "btnBedroom";
            this.btnBedroom.Size = new System.Drawing.Size(123, 40);
            this.btnBedroom.TabIndex = 12;
            this.btnBedroom.Text = "Lights";
            this.btnBedroom.UseVisualStyleBackColor = false;
            this.btnBedroom.Click += new System.EventHandler(this.btnBedroom_Click);
            // 
            // btnGuestroom
            // 
            this.btnGuestroom.BackColor = System.Drawing.SystemColors.Control;
            this.btnGuestroom.Location = new System.Drawing.Point(15, 36);
            this.btnGuestroom.Name = "btnGuestroom";
            this.btnGuestroom.Size = new System.Drawing.Size(123, 40);
            this.btnGuestroom.TabIndex = 13;
            this.btnGuestroom.Text = "Lights";
            this.btnGuestroom.UseVisualStyleBackColor = false;
            this.btnGuestroom.Click += new System.EventHandler(this.btnGuestroom_Click);
            // 
            // btnFloodlights
            // 
            this.btnFloodlights.BackColor = System.Drawing.SystemColors.Control;
            this.btnFloodlights.Location = new System.Drawing.Point(21, 19);
            this.btnFloodlights.Name = "btnFloodlights";
            this.btnFloodlights.Size = new System.Drawing.Size(123, 40);
            this.btnFloodlights.TabIndex = 12;
            this.btnFloodlights.Text = "Floodlights";
            this.btnFloodlights.UseVisualStyleBackColor = false;
            this.btnFloodlights.Click += new System.EventHandler(this.btnFloodlights_Click);
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(836, 468);
            this.Controls.Add(this.groupBox5);
            this.Controls.Add(this.groupBox4);
            this.Controls.Add(this.groupBox1);
            this.Controls.Add(this.groupBox3);
            this.Controls.Add(this.groupBox2);
            this.Controls.Add(this.outside);
            this.Controls.Add(this.btnSystemEnable);
            this.Controls.Add(this.houseIDLabel);
            this.Controls.Add(this.houseID);
            this.Controls.Add(this.statusStrip1);
            this.Name = "Form1";
            this.Text = "HOMOS Device Simulator";
            this.outside.ResumeLayout(false);
            this.groupBox2.ResumeLayout(false);
            this.groupBox3.ResumeLayout(false);
            this.groupBox1.ResumeLayout(false);
            this.groupBox4.ResumeLayout(false);
            this.groupBox5.ResumeLayout(false);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.StatusStrip statusStrip1;
        private System.Windows.Forms.TextBox houseID;
        private System.Windows.Forms.Label houseIDLabel;
        private System.Windows.Forms.Button btnSystemEnable;
        private System.Windows.Forms.GroupBox outside;
        private System.Windows.Forms.GroupBox groupBox2;
        private System.Windows.Forms.GroupBox groupBox3;
        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.GroupBox groupBox4;
        private System.Windows.Forms.GroupBox groupBox5;
        private System.Windows.Forms.Button btnLightsKitchen;
        private System.Windows.Forms.Button btnLightsLivingroom;
        private System.Windows.Forms.Button btnLightsStudy;
        private System.Windows.Forms.Button btnBedroom;
        private System.Windows.Forms.Button btnGuestroom;
        private System.Windows.Forms.Button btnFloodlights;

    }
}

