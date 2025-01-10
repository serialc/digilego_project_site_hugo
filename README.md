# digilego_project_site_hugo
The digilego project information and news website. A backup.

Below is helpful information on getting the repository (and sub-repository) and how to update the site.

## Clone repository for updating
Need to pull submodules (sub repositories)

### Cloning
    git clone --recurse-submodules git@github.com:serialc/digilego_project_site_hugo.git

### Two step
Clone the repository:

    git clone git@github.com:serialc/digilego_project_site_hugo.git

Then from inside the repository:

    git submodule update

## Hugo
You may need to install hugo.

Go to the hugo directory and start the server to see changes in real-time:
    hugo server

Click the link provided and it will open the site in the browser.

Customize the content. When finished, upload to server.

See the ```upload.bsh``` script.

    ./upload.bsh

