import os

dirs = ['components', 'getting-started', 'developers']

template = "<script>document.location = '/{}/{}/';</script>"

for check_dir in dirs:
    for path in os.listdir(os.path.join('public', check_dir)):
        check_path = os.path.join('public', check_dir, path)

        if os.path.isdir(check_path):
            new_path = os.path.join('source', check_dir, "{}.html".format(path))
            # print(template.format(check_dir, path))
            # print(new_path)
            with open(new_path, 'w') as outp:
                outp.write(template.format(check_dir, path))

# Generated
