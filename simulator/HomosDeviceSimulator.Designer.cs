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
            this.btnGarageDoor = new System.Windows.Forms.Button();
            this.btnFloodlights = new System.Windows.Forms.Button();
            this.groupBox2 = new System.Windows.Forms.GroupBox();
            this.btnKitchenDoor = new System.Windows.Forms.Button();
            this.btnLightsKitchen = new System.Windows.Forms.Button();
            this.groupBox3 = new System.Windows.Forms.GroupBox();
            this.btnFrontDoor = new System.Windows.Forms.Button();
            this.btnLightsLivingroom = new System.Windows.Forms.Button();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.btnStudyDoor = new System.Windows.Forms.Button();
            this.btnLightsStudy = new System.Windows.Forms.Button();
            this.groupBox4 = new System.Windows.Forms.GroupBox();
            this.btnBedroomDoor = new System.Windows.Forms.Button();
            this.btnBedroom = new System.Windows.Forms.Button();
            this.groupBox5 = new System.Windows.Forms.GroupBox();
            this.btnGuestDoor = new System.Windows.Forms.Button();
            this.btnGuestroom = new System.Windows.Forms.Button();
            this.btnMovement = new System.Windows.Forms.Button();
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
            this.statusStrip1.Location = new System.Drawing.Point(0, 417);
            this.statusStrip1.Name = "statusStrip1";
            this.statusStrip1.Size = new System.Drawing.Size(531, 22);
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
            this.btnSystemEnable.Click += new System.EventHandler(this.btnSystemEnable_Click);
            // 
            // outside
            // 
            this.outside.Controls.Add(this.btnMovement);
            this.outside.Controls.Add(this.btnGarageDoor);
            this.outside.Controls.Add(this.btnFloodlights);
            this.outside.Location = new System.Drawing.Point(15, 49);
            this.outside.Name = "outside";
            this.outside.Size = new System.Drawing.Size(485, 65);
            this.outside.TabIndex = 4;
            this.outside.TabStop = false;
            this.outside.Text = "Outside";
            // 
            // btnGarageDoor
            // 
            this.btnGarageDoor.BackColor = System.Drawing.SystemColors.Control;
            this.btnGarageDoor.Location = new System.Drawing.Point(150, 19);
            this.btnGarageDoor.Name = "btnGarageDoor";
            this.btnGarageDoor.Size = new System.Drawing.Size(123, 40);
            this.btnGarageDoor.TabIndex = 10;
            this.btnGarageDoor.Text = "Garage Door";
            this.btnGarageDoor.UseVisualStyleBackColor = false;
            this.btnGarageDoor.Click += new System.EventHandler(this.btnGarageDoor_Click);
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
            // groupBox2
            // 
            this.groupBox2.Controls.Add(this.btnKitchenDoor);
            this.groupBox2.Controls.Add(this.btnLightsKitchen);
            this.groupBox2.Location = new System.Drawing.Point(15, 120);
            this.groupBox2.Name = "groupBox2";
            this.groupBox2.Size = new System.Drawing.Size(167, 125);
            this.groupBox2.TabIndex = 5;
            this.groupBox2.TabStop = false;
            this.groupBox2.Text = "Kitchen";
            // 
            // btnKitchenDoor
            // 
            this.btnKitchenDoor.BackColor = System.Drawing.SystemColors.Control;
            this.btnKitchenDoor.Location = new System.Drawing.Point(21, 65);
            this.btnKitchenDoor.Name = "btnKitchenDoor";
            this.btnKitchenDoor.Size = new System.Drawing.Size(123, 40);
            this.btnKitchenDoor.TabIndex = 10;
            this.btnKitchenDoor.Text = "Back Door";
            this.btnKitchenDoor.UseVisualStyleBackColor = false;
            this.btnKitchenDoor.Click += new System.EventHandler(this.btnKitchenDoor_Click);
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
            // groupBox3
            // 
            this.groupBox3.Controls.Add(this.btnFrontDoor);
            this.groupBox3.Controls.Add(this.btnLightsLivingroom);
            this.groupBox3.Location = new System.Drawing.Point(188, 120);
            this.groupBox3.Name = "groupBox3";
            this.groupBox3.Size = new System.Drawing.Size(312, 125);
            this.groupBox3.TabIndex = 6;
            this.groupBox3.TabStop = false;
            this.groupBox3.Text = "Livingroom";
            // 
            // btnFrontDoor
            // 
            this.btnFrontDoor.BackColor = System.Drawing.SystemColors.Control;
            this.btnFrontDoor.Location = new System.Drawing.Point(17, 65);
            this.btnFrontDoor.Name = "btnFrontDoor";
            this.btnFrontDoor.Size = new System.Drawing.Size(123, 40);
            this.btnFrontDoor.TabIndex = 10;
            this.btnFrontDoor.Text = "Front Door";
            this.btnFrontDoor.UseVisualStyleBackColor = false;
            this.btnFrontDoor.Click += new System.EventHandler(this.btnFrontDoor_Click);
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
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.btnStudyDoor);
            this.groupBox1.Controls.Add(this.btnLightsStudy);
            this.groupBox1.Location = new System.Drawing.Point(15, 248);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(167, 156);
            this.groupBox1.TabIndex = 7;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Study";
            // 
            // btnStudyDoor
            // 
            this.btnStudyDoor.BackColor = System.Drawing.SystemColors.Control;
            this.btnStudyDoor.Location = new System.Drawing.Point(21, 82);
            this.btnStudyDoor.Name = "btnStudyDoor";
            this.btnStudyDoor.Size = new System.Drawing.Size(123, 40);
            this.btnStudyDoor.TabIndex = 11;
            this.btnStudyDoor.Text = "Door";
            this.btnStudyDoor.UseVisualStyleBackColor = false;
            this.btnStudyDoor.Click += new System.EventHandler(this.btnStudyDoor_Click);
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
            // groupBox4
            // 
            this.groupBox4.Controls.Add(this.btnBedroomDoor);
            this.groupBox4.Controls.Add(this.btnBedroom);
            this.groupBox4.Location = new System.Drawing.Point(188, 248);
            this.groupBox4.Name = "groupBox4";
            this.groupBox4.Size = new System.Drawing.Size(155, 156);
            this.groupBox4.TabIndex = 8;
            this.groupBox4.TabStop = false;
            this.groupBox4.Text = "Bedroom";
            // 
            // btnBedroomDoor
            // 
            this.btnBedroomDoor.BackColor = System.Drawing.SystemColors.Control;
            this.btnBedroomDoor.Location = new System.Drawing.Point(17, 82);
            this.btnBedroomDoor.Name = "btnBedroomDoor";
            this.btnBedroomDoor.Size = new System.Drawing.Size(123, 40);
            this.btnBedroomDoor.TabIndex = 12;
            this.btnBedroomDoor.Text = "Door";
            this.btnBedroomDoor.UseVisualStyleBackColor = false;
            this.btnBedroomDoor.Click += new System.EventHandler(this.btnBedroomDoor_Click);
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
            // groupBox5
            // 
            this.groupBox5.Controls.Add(this.btnGuestDoor);
            this.groupBox5.Controls.Add(this.btnGuestroom);
            this.groupBox5.Location = new System.Drawing.Point(349, 248);
            this.groupBox5.Name = "groupBox5";
            this.groupBox5.Size = new System.Drawing.Size(151, 156);
            this.groupBox5.TabIndex = 9;
            this.groupBox5.TabStop = false;
            this.groupBox5.Text = "Guest Room";
            // 
            // btnGuestDoor
            // 
            this.btnGuestDoor.BackColor = System.Drawing.SystemColors.Control;
            this.btnGuestDoor.Location = new System.Drawing.Point(15, 82);
            this.btnGuestDoor.Name = "btnGuestDoor";
            this.btnGuestDoor.Size = new System.Drawing.Size(123, 40);
            this.btnGuestDoor.TabIndex = 10;
            this.btnGuestDoor.Text = "Door";
            this.btnGuestDoor.UseVisualStyleBackColor = false;
            this.btnGuestDoor.Click += new System.EventHandler(this.btnGuestDoor_Click);
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
            // btnMovement
            // 
            this.btnMovement.BackColor = System.Drawing.SystemColors.Control;
            this.btnMovement.Location = new System.Drawing.Point(279, 19);
            this.btnMovement.Name = "btnMovement";
            this.btnMovement.Size = new System.Drawing.Size(123, 40);
            this.btnMovement.TabIndex = 11;
            this.btnMovement.Text = "Simulate Movement";
            this.btnMovement.UseVisualStyleBackColor = false;
            this.btnMovement.Click += new System.EventHandler(this.btnMovement_Click);
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(531, 439);
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
        private System.Windows.Forms.Button btnGarageDoor;
        private System.Windows.Forms.Button btnKitchenDoor;
        private System.Windows.Forms.Button btnFrontDoor;
        private System.Windows.Forms.Button btnStudyDoor;
        private System.Windows.Forms.Button btnBedroomDoor;
        private System.Windows.Forms.Button btnGuestDoor;
        private System.Windows.Forms.Button btnMovement;

    }
}

