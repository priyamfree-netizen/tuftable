import { hasClassProps } from "@utils/helpers";

function BrandLogoLight({ className }) {
  return (
    <>
      <img
        className={`logo-dark${hasClassProps(className)}`}
        src="/image/icons/logo-whites.svg"
        alt="brand logo"
      />
    </>
  );
}
function BrandLogoDark({ className, logoUrl = "/image/logo.png" }) {
  return (
    <>
      <img
        className={` logo-light${hasClassProps(className)}`}
        src={logoUrl}
        alt="brand logo"
      />
    </>
  );
}
export default function BrandLogo({ className, type, logoUrl }) {
  let logoSettings = {
    className,
    type,
    logoUrl,
  };
  if (type === "white") {
    return <BrandLogoLight {...logoSettings} />;
  } else {
    return <BrandLogoDark {...logoSettings} />;
  }
}
